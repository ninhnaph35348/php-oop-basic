<?php

session_start();

spl_autoload_register(function ($class) {
    $fileName = "$class.php";

    $fileModel = PATH_MODEL . $fileName;
    $fileControlerAdmin = PATH_CONTROLLER_ADMIN . $fileName;
    $fileControlerClient = PATH_CONTROLLER_CLIENT . $fileName;

    if (is_readable($fileModel)) {
        require_once $fileModel;
    }
    if (is_readable($fileControlerAdmin)) {
        require_once $fileControlerAdmin;
    }
    if (is_readable($fileControlerClient)) {
        require_once $fileControlerClient;
    }
});


require_once "./configs/env.php";
require_once "./configs/helper.php";

$mode = $_GET['mode'] ?? "client";

if ($mode == 'admin') {
    require_once './routes/admin.php';
} else {
    require_once './routes/client.php';
}
