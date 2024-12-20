<?php

session_start();

unset($_SESSION["name"]);
session_destroy();

setcookie("name", '', time() - 3600, "/");
setcookie("pass", '', time() - 3600, "/");


header("Location: index.php");
