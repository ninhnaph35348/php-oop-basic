<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $product = htmlspecialchars($_POST["product"]);
    $quantity = (int)$_POST["quantity"];
    $address = htmlspecialchars($_POST["address"]);
}


$prices = [
    "Oppo" => 1000,
    "Iphone" => 3000,
    "Samsung" => 2000,
];

$totalProduct = $prices[$product] * $quantity;

echo "
    <h2>Thông tin và đơn hàng</h2>
    <p>Họ tên : $name</p>
    <p>Email : $email</p>
    <p>Số điện thoại : $phone</p>
    <p>Sản phẩm : $product</p>
    <p>Số lượng : $quantity</p>
    <p>Tổng giá trị đơn hàng là: $totalProduct</p>
    <p>Địa chỉ giao hàng : $address</p>
    <p>Cảm ơn bản đã đặt hàng! Đơn của bạn sẽ được giao tới địa chỉ cung cấp</p>
";
