<?php

session_start();

if (isset($_SESSION["name"]) || isset($_COOKIE['name'])) {

    $name = $_SESSION['name'] ? $_SESSION['name'] : $_COOKIE['name'];

?>
    <h2>Chào mừng <?= $name ?> , bạn đã đăng nhập thành công</h2>
    <a href="logout.php">Đăng suất</a>
<?php } else {
    header('Location: index.php');
    exit();
} ?>