<h1>FORM GET</h1>
<form action="get.php" method="get" enctype="multipart/form-data">
    <div>
        <label for="">UserName</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <label for="">Avatar</label>
        <input type="file" name="avatar">
    </div>

    <button type="submit">Submit</button>
</form>
<br><br><br><br>
<h1>FORM POST</h1>
<form action="post.php" method="POST" enctype="multipart/form-data">
    <div>
        <label for="">UserName</label>
        <input type="text" name="name">
    </div>
    <div>
        <label for="">Password</label>
        <input type="password" name="password">
    </div>
    <div>
        <label for="">Avatar</label>
        <input type="file" name="avatar">
    </div>

    <button type="submit">Submit</button>
</form>