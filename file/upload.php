<?php

if (isset($_SERVER['REQUEST_METHOD']) == "POST") {

    $targetDir = "uploads/"; // Thư mục lưu file upload
    $fileAvatar = $_FILES['avatar']; // lấy dữ liệu avatar từ mảng 2 chiều $_FILES
    $targetFile = $targetDir . time() . "-" . $fileAvatar['name']; // Đường dẫn của file được upload
    $upLoadOk = 1; // Cờ để nhận biết file upload thành công hay không , mặc định là thành công
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Lấy ra extension của file


    if (file_exists($targetFile)) {
        echo 'Xin lỗi file đã tồn tại';
        $upLoadOk = 0;
    }

    $maxSize = 5 * 1024 * 1024;

    if ($fileAvatar['size'] > $maxSize) {
        echo 'Xin Lỗi File của bản quá lớn' . PHP_EOL;
        $upLoadOk = 0;
    }

    $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
    if (!in_array($fileType, $allowTypes)) {
        echo "Xin lỗi chỉ chấp nhận các loại đường dẫn jpg png jpeg gif" . PHP_EOL;
        $upLoadOk = 0;
    }

    if ($upLoadOk == 0) {
        echo "Xin Lỗi File của bạn không thể upload" . PHP_EOL;
    } else {
        if (move_uploaded_file($fileAvatar["tmp_name"], $targetFile)) {
            echo "Upload thành công!!";
        } else {
            echo "Có lỗi xảy ra khi upload";
        }
    }
}
