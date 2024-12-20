<?php
session_start();

if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($name) && empty($email) && empty($password) && empty($confirm_password)) {
        $_SESSION['errors'] = 'Vui lòng nhập đầy đủ các trường';
        header('Location: register.php');
        exit();
    }

    if ($password != $confirm_password) {
        $_SESSION['errors'] = "password và confirm_password phải giống nhau";
        header('Location: register.php');
        exit();
    }

    if (empty($_SESSION['errors'])) {
        $_SESSION['success'] = 'Đăng kí thành công';
        header('Location: index.php');
        exit();
    }
}
