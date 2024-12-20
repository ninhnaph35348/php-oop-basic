<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Dashboard" ?></title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-light">

        <div class="container-fluid">
            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_ADMIN ?>">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL_ADMIN . '&act=users-index' ?>">Danh Sách Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link 3</a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="container mt-3">
        <h1><?= $title ?? "Dashboard" ?></h1>
        <?php if (isset($view)) {
            require_once PATH_VIEW_ADMIN . $view . '.php';
        } ?>
    </div>

</body>

</html>