<?php

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => (new DashBoardController)->index(),
    'users-index' => (new UserController())->index(),
    'users-show' => (new UserController())->show(),
    'users-create' => (new UserController())->create(),
    'users-store' => (new UserController())->store(),
    'users-edit' => (new UserController())->edit(),
    'users-update' => (new UserController())->update(),
    'users-delete' => (new UserController())->delete(),
};
