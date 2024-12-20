<?php
if (isset($_SESSION['success'])) {
    $class = $_SESSION['success'] ? 'alert-success' : 'alert-danger';

    echo "<div class=' alert $class'>{$_SESSION['msg']}</div>";

    unset($_SESSION['success']);
    unset($_SESSION['msg']);
}
?>

<?php if (!empty($_SESSION['errors'])): ?>

    <div class="alert alert-danger">

        <ul>
            <?php foreach ($_SESSION['errors'] as $value): ?>
                <li><?= $value; ?></li>
            <?php endforeach; ?>
        </ul>

    </div>

    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>




<form action="<?= BASE_URL_ADMIN . "&act=users-store" ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3 mt-3">
        <label for="avatar" class="form-label">Avatar:</label>
        <input type="file" class="form-control" id="avatar" placeholder="Enter avatar" name="avatar">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>