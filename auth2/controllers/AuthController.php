<?php
class AuthController
{
    protected $auth;

    public function __construct()
    {
        $this->auth = new Auth;
    }

    public function login()
    {
        require_once './views/login.php';
    }

    public function postLogin()
    {

        try {
            if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

                $name = $_POST['name'] ?? null;
                $password = $_POST['password'] ?? null;

                if (empty($name) || empty($password)) {
                    throw new Exception(message: 'Tài khoản mật khẩu không được để trống');
                }

                $user = $this->auth->loginUser($name, $password);

                if (empty($user)) {
                    throw new Exception('Tài khoản mật khẩu không chính xác');
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
        require_once './views/register.php';
    }

    public function postregister()
    {
        try {
            if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

                $name = $_POST['name'] ?? null;
                $password = $_POST['password'] ?? null;
                $rePassword = $_POST['rePassword'] ?? null;

                if (empty($name) || empty($password) || empty($rePassword)) {
                    throw new Exception(message: 'Vui lòng điền đầy đủ thông tin');
                }
                if ($rePassword != $password) {
                    throw new Exception(message: 'pass và rePass phải giống nhau');
                }
                if ($this->auth->isUserTaken($name)) {
                    throw new Exception(message: 'Tài khoản đã tồn tại');
                }


                $this->auth->registerUser($name, $password);


                header('Location: ' . BASE_URL . "?act=login");
                exit();
            }
        } catch (\Throwable $th) {
            $_SESSION['success'] = false;
            $_SESSION['msg'] = $th->getMessage();

            header('Location: ' . BASE_URL . "?act=register");
            exit();
        }
    }

    public function logout()
    {

        unset($_SESSION['user']);
        session_destroy();

        header('Location: ' . BASE_URL . "?act=login");
        exit();
    }
}
