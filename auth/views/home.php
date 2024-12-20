<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3">Đây là trang chủ</h1>

        <?php if (!empty($_SESSION['user'])): ?>
            <h3>Xin chào <?= $_SESSION['user']['name'] ?></h3>
            <a href="<?= BASE_URL . '?act=logout' ?>" class="btn btn-secondary" onclick="return confirm('Đăng suất?')">Đăng Suất</a>
        <?php endif; ?>
    </div>
</body>

</html>