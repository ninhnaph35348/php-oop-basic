<?php
session_start();
?>
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
        <h2>Đăng nhập</h2>

        <?php if (!empty($_SESSION['errors'])): ?>
            <p class="alert alert-danger"><?= $_SESSION['errors'] ?></p>
        <?php
            unset($_SESSION['errors']);
        endif;
        ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
        <?php
            unset($_SESSION['success']);
        endif;
        ?>

        <form action="login.php" method="post">
            <div class="mb-3 mt-3">
                <label for="email">Username:</label>
                <input type="text" class="form-control" placeholder="Enter email" name="name">
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button><br>
            <a href="register.php">chưa có tài khoản đăng kí</a>
        </form>
    </div>

</body>

</html>