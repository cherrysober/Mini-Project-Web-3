<?php
include_once "config.php";
require "session.php";

$user_id = $_SESSION['user_id'];
$sql = "SELECT cart.*, p.* FROM cart JOIN products p ON p.id_products = cart.id_products WHERE cart.id_users = '$user_id' AND cart.checked = 1";
$result = $con->query($sql);
$carts = $result->fetch_all(MYSQLI_ASSOC);

foreach ($carts as $cart) {
    $product_id = $cart['id_products'];
    $quantity = $cart['quantity'];
    $item_price = $cart['price'];
    $subtotal = $quantity * $item_price;
    $sql = "INSERT INTO invoice (id_users, id_products, quantity, item_price, subtotal, invoice_date) VALUES ('$user_id', '$product_id', '$quantity', '$item_price', '$subtotal', NOW())";
    $con->query($sql);
}

$sql = "DELETE FROM cart WHERE id_users = '$user_id' AND checked = 1";
$con->query($sql);

echo "<script>alert('Checkout berhasil!');</script>";
echo "<script>location.href='invoice.php';</script>"; 
?>
