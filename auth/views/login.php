<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Nhập</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Đăng Nhập</h2>
        <?php
        if (isset($_SESSION['success'])) {
            $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

            echo "<div class='alert $class'> {$_SESSION['msg']} </div>";

            unset($_SESSION['success']);
            unset($_SESSION['msg']);
        }
        ?>
        <form action="<?= BASE_URL . '?act=post-login' ?>" method="POST">
            <div class="mb-3 mt-3">
                <label for="name">UserName:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Submit</button><br>
            <a href="<?= BASE_URL . '?act=register' ?>">chưa có tài khoản?Đăng kí</a>
        </form>
    </div>

</body>

</html>