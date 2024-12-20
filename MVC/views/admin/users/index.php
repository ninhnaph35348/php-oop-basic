<a href="<?= BASE_URL_ADMIN  . "&act=users-create" ?>" class="btn btn-info">Create</a>

<div class="container mt-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $user): ?>
                <tr>
                    <td><?= 1 + $key++ ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <?php if (!empty($user['avatar'])): ?>
                            <img src="<?= BASE_ASSETS_UPLOADS . $user['avatar'] ?>" width="50px" alt="">
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= BASE_URL_ADMIN . "&act=users-show&id=" . $user['id'] ?>" class="btn btn-primary">Show</a>
                        <a href="<?= BASE_URL_ADMIN . "&act=users-edit&id=" . $user['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= BASE_URL_ADMIN . "&act=users-delete&id=" . $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không???')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>