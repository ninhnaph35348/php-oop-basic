<?php

session_start();

require_once "./configs/env.php";
require_once './configs/Common.php';

require_once './controllers/HomeController.php';
require_once './controllers/AuthController.php';

require_once './models/Auth.php';

$act = $_GET['act'] ?? '/';


match ($act) {
    '/' => (new HomeController)->index(),
    'login' => (new AuthController)->login(),
    'post-login' => (new AuthController)->postLogin(),
    'register' => (new AuthController)->register(),
    'post-register' => (new AuthController)->postRegister(),
    'logout' => (new AuthController)->logout(),
};
