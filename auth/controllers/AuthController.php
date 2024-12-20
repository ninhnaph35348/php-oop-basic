<?php

class AuthController
{

    protected $Auth;

    public function __construct()
    {
        $this->Auth = new Auth();
    }
    public function login()
    {
        require_once "./views/login.php";
    }

    public function postLogin()
    {
        try {
            if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

                $name = $_POST["name"] ?? null;
                $password = $_POST["password"] ?? null;

                if (empty($name) && empty($password)) {
                    throw new Exception('Email và Password không được để trống!');
                }

                $user = $this->Auth->loginUser($name, $password);

                if (empty($user)) {
                    throw new Exception('Thông tin tài khoản không đúng!');
                }

                $_SESSION['user'] = $user;

                header('Location: ' . BASE_URL);
                exit();
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . "?act=login");
            exit();
        }
    }
    public function register()
    {
        require_once "./views/register.php";
    }

    public function postRegister()
    {
        try {
            // Kiểm tra phương thức yêu cầu
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $name = $_POST["name"] ?? null;
                $password = $_POST["password"] ?? null;
                $rePassword = $_POST["rePassword"] ?? null;

                // Kiểm tra dữ liệu đầu vào
                if (empty($name) || empty($password) || empty($rePassword)) {
                    throw new Exception("Vui lòng nhập đầy đủ thông tin!");
                }

                if ($password !== $rePassword) {
                    throw new Exception("Password và RePassword không khớp!");
                }

                // Kiểm tra trùng tài khoản
                if ($this->Auth->isUsernameTaken($name)) {
                    throw new Exception("Tên tài khoản đã tồn tại, vui lòng chọn tên khác!");
                }

                // Đăng ký tài khoản mới
                $this->Auth->registerUser($name, $password);

                // Chuyển hướng tới trang đăng nhập

                header("Location: " . BASE_URL . '?act=login');
                $_SESSION['success'] = true;
                $_SESSION['msg'] = 'Đăng kí thành công';
                exit();
            }
        } catch (\Throwable $th) {
            // Chuyển hướng lại trang đăng ký kèm thông báo lỗi
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();
            header("Location: " . BASE_URL . '?act=register');
            exit();
        }
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION["user"]);
        header('Location: ' . BASE_URL . "?act=login");
        exit();
    }
}
