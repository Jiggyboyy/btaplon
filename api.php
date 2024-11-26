<?php
header('Content-Type: application/json');

// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "smaker_clothing";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy danh sách sản phẩm
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

// Trả về dữ liệu dưới dạng JSON
echo json_encode($products);

$conn->close();
?>