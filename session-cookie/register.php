<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Ký</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <div class="container mt-3">
        <h2>Đăng ký</h2>

        <?php if (isset($_SESSION['errors'])): ?>
            <p class="alert alert-danger"><?= $_SESSION['errors'] ?></p>
        <?php
            unset($_SESSION['errors']);
        endif;
        ?>
        <form action="postRegister.php" method="post">
            <div class="mb-3 mt-3">
                <label for="name">Username:</label>
                <input type="text" class="form-control" placeholder="Enter username" name="name">
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
            <div class="mb-3">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" placeholder="Confirm password" name="confirm_password">
            </div>
            <button type="submit" class="btn btn-primary">Register</button><br>

            <a href="index.php">có tài khoản đăng nhập</a>
        </form>
    </div>

</body>

</html>