<form action="<?= BASE_URL_ADMIN . "&act=users-store" ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3 mt-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?= $user['name'] ?>" disabled>
    </div>
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?= $user['email'] ?>" disabled>
    </div>
    <div class="mb-3 mt-3">
        <label for="avatar" class="form-label">Avatar:</label>
        <img src="<?= BASE_ASSETS_UPLOADS . $user['avatar'] ?>" width="200px" alt="" disabled>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?= $user['password'] ?>" disabled>
    </div>
</form>