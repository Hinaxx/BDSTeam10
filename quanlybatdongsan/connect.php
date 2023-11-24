<?php
// Thông tin kết nối đến MySQL
$serverName = "localhost"; // Tên máy chủ MySQL
$username = "root"; // Tên đăng nhập MySQL
$password = ""; // Mật khẩu MySQL
$databaseName = "bds"; // Tên cơ sở dữ liệu MySQL

// Tạo kết nối
$conn = new mysqli($serverName, $username, $password, $databaseName);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
}

// Đảm bảo set encoding là UTF-8 để hỗ trợ ký tự đặc biệt
$conn->set_charset("utf8");

// Đảm bảo thay thế 'your_username', 'your_password', và 'your_database' bằng thông tin thực tế của bạn.
?>
