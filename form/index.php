<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng trực tuyến</title>
</head>

<body>
    <h1>Hệ thông đặt hàng trực tuyến</h1>
    <form action="order.php" method="POST">
        <div>
            <label for="">Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="">Email</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label for="">Phone</label>
            <input type="text" name="phone" required>
        </div>

        <h1>Chi tiết đơn hàng</h1>
        Sản Phẩm:
        <select name="product">
            <option value="Oppo">Oppo</option>
            <option value="Iphone">Iphone</option>
            <option value="Samsung">Samsung</option>
        </select><br><br>

        Số Lượng:
        <input type="number" name="quantity" min="1" required><br><br>

        <h2>Địa chỉ giao hàng</h2>
        Địa chỉ: <input type="text" name="address" required><br><br>

        <button type="submit">Đặt hàng</button>
    </form>
</body>

</html>

