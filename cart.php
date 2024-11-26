<?php
session_start();
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$productId = $data['id'];

// Giả sử bạn đã có một mảng giỏ hàng trong session
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
if (array_key_exists($productId, $_SESSION['cart'])) {
    $_SESSION['cart'][$productId] += 1; // Tăng số lượng nếu đã có
} else {
    $_SESSION['cart'][$productId] = 1; // Thêm sản phẩm mới vào giỏ hàng
}

echo json_encode(array('success' => true, 'cart' => $_SESSION['cart']));
?>