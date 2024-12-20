<?php

session_start();

$validName = "anninh";
$validPass = "1212";


if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    if (empty($name) || empty($password)) {
        $_SESSION['errors'] = 'Không để tài khoản mật khẩu trống';
        header('Location: index.php');
        exit();
    }

    if ($name == $validName && $password == $validPass) {

        if (isset($_POST['remember'])) {
            setcookie('name', $name, time() + 60 * 2, '/');
        } else {
            $_SESSION['name'] = $name;
        }
        header('Location: welcome.php');
        exit();
    } else {
        $_SESSION['errors'] = 'Tài khoản mật khẩu không chính xác!!!';
        header('Location: index.php');
        exit();
    }
}
