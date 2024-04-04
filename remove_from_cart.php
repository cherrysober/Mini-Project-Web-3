<?php
// Mulai sesi
require_once "config.php";

// Periksa apakah parameter products_name dikirim melalui metode POST
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // get carts
    $sql = "SELECT * FROM cart WHERE id_users = '$user_id' AND id_products = '$product_id'";
    $result = $con->query($sql);
    $cart = $result->fetch_assoc();

    // Periksa apakah sesi keranjang ada dan tidak kosong
    if (isset($cart) && !empty($cart)) {
        // Hapus produk dari keranjang
        $sql = "DELETE FROM cart WHERE id_users = '$user_id' AND id_products = '$product_id'";
        $con->query($sql);

        // Kirimkan respons JSON yang berhasil jika produk berhasil dihapus
        echo json_encode(array('success' => true, 'message' => 'Product successfully removed from cart.'));
        header("Location: cart.php");
    } else {
        // Kirimkan respons JSON bahwa keranjang kosong jika tidak ada item di keranjang
        echo json_encode(array('success' => false, 'message' => 'Cart is empty.'));
    }
} else {
    // Kirimkan respons JSON bahwa parameter productName tidak ditemukan jika tidak ada data yang diterima
    echo json_encode(array('success' => false, 'message' => 'Product id parameter not found.'));
}
