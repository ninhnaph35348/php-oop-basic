<?php

class UserController
{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }


    public function index()
    {
        $view = "users/index";
        $title = "Danh sách User";
        $data = $this->user->select('*', '1=1 ORDER BY id DESC');

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function show()
    {

        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $id = $_GET['id'];

            $user = $this->user->find('*', 'id=:id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("User có ID = $id KHông tồn tại");
            }

            $view = "users/show";
            $title = "Chi Tiết User có ID: " . $id;
            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {

            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&action=users-index');
        }
    }
    public function create()
    {
        $view = "users/create";
        $title = "Thêm Mới User";

        require_once PATH_VIEW_ADMIN_MAIN;
    }

    public function store()
    {
        try {
            if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
                $data = $_POST + $_FILES;


                $_SESSION['errors'] = [];

                if (empty($data['name']) || strlen($data['name']) > 50) {
                    $_SESSION['errors']['name'] = "Trường name không được bỏ trống và không được quá 50 kí tự";
                }

                if (
                    empty($data['email'])
                    || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
                    || strlen($data['email']) > 100
                    || !empty($this->user->find("*", 'email = :email', ['email' => $data['email']]))
                ) {
                    $_SESSION['errors']['email'] = "Trường email không được để trống , không được quá 100 kí tự và không được trùng";
                }

                if (empty($data['password']) || strlen($data['password']) > 30) {
                    $_SESSION['errors']['password'] = "Trường password không được bỏ trống và không được quá 30 kí tự";
                }

                if ($data['avatar']['size'] > 0) {
                    if ($data['avatar']['size'] > 5 * 1024 * 1024) {
                        $_SESSION['errors']['avatar_size'] = "trường avatar có dung lượng vượt quá 2mb";
                    }

                    $fileType = $data['avatar']['type'];

                    $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

                    if (!in_array($fileType, $allowedTypes)) {
                        $_SESSION['errors']['avatar_type'] = "Chỉ chấp nhận các loại file như JPG , JPEG , PNG , GIF";
                    }
                }

                if (!empty($_SESSION['errors'])) {
                    $_SESSION['data'] = $data;

                    throw new Exception('Dữ liệu lỗi');
                }

                if ($data['avatar']['size'] > 0) {
                    $data['avatar'] = upload_file('users', $data['avatar']);
                } else {
                    $data['avatar'] = null;
                }

                $rowCount = $this->user->insert($data);

                if ($rowCount > 0) {
                    $_SESSION['success'] = true;
                    $_SESSION['msg'] = "Thao tác thành công";
                    header('Location: ' . BASE_URL_ADMIN . '&act=users-index');
                    exit();
                } else {
                    throw new Exception("Thao tác không thành công");
                }
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&act=users-create');
            exit();
        }
    }
    public function edit()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $id = $_GET['id'];

            $user = $this->user->find('*', 'id=:id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("User có ID = $id KHông tồn tại");
            }

            $view = "users/edit";
            $title = "Cập nhật User có ID: " . $id;
            require_once PATH_VIEW_ADMIN_MAIN;
        } catch (\Throwable $th) {

            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_ASSETS_ADMIN . '&action=users-index');
        }
    }
    public function update()
    {
        try {
            $id = $_GET['id'];

            $user = $this->user->find('*', 'id=:id', ['id' => $id]);

            $data = $_POST + $_FILES;

            $_SESSION['errors'] = [];

            if (strlen($data['name']) > 50) {
                $_SESSION['errors']['name'] = "Trường name không được quá 50 kí tự";
            }

            if (
                !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
                || strlen($data['email']) > 100
            ) {
                $_SESSION['errors']['email'] = "Trường email không được quá 100 kí tự";
            }

            if (strlen($data['password']) > 30) {
                $_SESSION['errors']['password'] = "Trường password không được quá 30 kí tự";
            }

            if ($data['avatar']['size'] > 0) {
                if ($data['avatar']['size'] > 5 * 1024 * 1024) {
                    $_SESSION['errors']['avatar_size'] = "trường avatar có dung lượng vượt quá 2mb";
                }

                $fileType = $data['avatar']['type'];

                $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];

                if (!in_array($fileType, $allowedTypes)) {
                    $_SESSION['errors']['avatar_type'] = "Chỉ chấp nhận các loại file như JPG , JPEG , PNG , GIF";
                }
            }

            if (!empty($_SESSION['errors'])) {
                $_SESSION['data'] = $data;

                throw new Exception('Dữ liệu lỗi');
            }

            if ($data['avatar']['size'] > 0) {
                $data['avatar'] = upload_file('users', $data['avatar']);
            } else {
                $data['avatar'] = $user['avatar'];
            }

            $data['updated_at'] = date('Y-m-d H:i:s');

            $rowCount = $this->user->update($data, 'id=:id', ['id' => $id]);

            if ($rowCount > 0) {
                if (
                    $_FILES['avatar']['size'] > 0
                    && !empty($user['avatar'])
                    && file_exists(PATH_ASSETS_UPLOADS . $user['avatar'])
                ) {
                    unlink(PATH_ASSETS_UPLOADS . $user['avatar']);
                }

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao tác thành công';
            } else {
                throw new Exception('Thao tác Không thành công!');
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage() . ' - Line: ' . $th->getLine();
        }
        header('Location: ' . BASE_URL_ADMIN . '&act=users-edit&id=' . $id);
        exit();
    }
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) {
                throw new Exception('Thiếu tham số "id', 99);
            }

            $id = $_GET['id'];

            $user = $this->user->find('*', 'id=:id', ['id' => $id]);

            if (empty($user)) {
                throw new Exception("User có ID = $id KHông tồn tại");
            }

            $rowCount = $this->user->delete('id=:id', ['id' => $id]);

            if ($rowCount > 0) {
                if (!empty($user['avatar']) && file_exists(PATH_ASSETS_UPLOADS . $user['avatar'])) {

                    unlink(PATH_ASSETS_UPLOADS . $user['avatar']);
                }

                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Thao tác thành công';
            } else {
                throw new Exception('Thao tác Không thành công!');
            }
        } catch (\Throwable $th) {

            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL_ADMIN . '&act=users-index');
        }
    }
}
