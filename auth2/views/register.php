<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Kí</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">
        <h2>Đăng Kí</h2>

        <?php if (isset($_SESSION['success'])): ?>
            <p class="alert alert-danger"><?= $_SESSION['msg'] ?></p>
        <?php
            unset($_SESSION['success']);
        endif; ?>

        <form action="<?= BASE_URL . "?act=post-register" ?>" method="POST">
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="mb-3">
                <label for="rePassword">rePassword:</label>
                <input type="password" class="form-control" id="rePassword" placeholder="Enter rePassword" name="rePassword">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Đăng Kí</button><br>
            <a href="<?= BASE_URL . '?act=login' ?>">có tài khoản?đăng nhập</a>
        </form>
    </div>

</body>

</html>