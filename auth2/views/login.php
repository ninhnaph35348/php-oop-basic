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

        <!-- <?php
                //  if (isset($_SESSION['success'])):
                ?>
            <p class="alert alert-success"><?= $_SESSION['success'] ?></p>
        <?php
        // unset($_SESSION['success']);
        // endif; 
        ?> -->


        <?php if (isset($_SESSION['success'])): ?>
            <p class="alert alert-danger"><?= $_SESSION['msg'] ?></p>
        <?php
            unset($_SESSION['success']);
        endif; ?>

        <form action="<?= BASE_URL . "?act=post-login" ?>" method="POST">
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Đăng nhập</button><br>
            <a href="<?= BASE_URL . '?act=register' ?>">chưa có tài khoản?đăng kí</a>
        </form>
    </div>

</body>

</html>