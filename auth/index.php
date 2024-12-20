<?php

session_start();

require_once "./configs/env.php";
require_once './configs/Common.php';

require_once './controllers/HomeController.php';
require_once './controllers/AuthController.php';

require_once './models/Auth.php';

$act = $_GET['act'] ?? '/';

$isLoggedIn = isset($_SESSION['user']);


match ($act) {
    '/' => $isLoggedIn ? (new HomeController)->index() : header('Location:'  . BASE_URL . '?act=login'),
    'login' => (new AuthController)->login(),
    'post-login' => (new AuthController)->postLogin(),
    'register' => (new AuthController)->register(),
    'post-register' => (new AuthController)->postRegister(),
    'logout' => (new AuthController)->logout(),
};
