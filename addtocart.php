<?php
include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product = json_decode($_POST['product']);
    $product_id = $product[4];
    $products_name = $product[0];
    $desc = $product[1];
    $price = $product[2];
    // $price = str_replace("$", "", $price);
    // $stocks = $_POST["stocks"];

    $sql = "SELECT * FROM products WHERE id_products = $product_id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    $price = $row['price'];
    $stocks = $row['stocks'];

    // Menyiapkan statement SQL untuk menyimpan data ke database
    // $sql = "INSERT INTO carts (products_name, desc, price, stocks) VALUES ('$products_name', '$desc', '$price', '$stocks')";
    if (!isset($_SESSION['user_id'])) {
        echo "Anda harus login terlebih dahulu";
        http_response_code(401);
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO cart (id_users, id_products, quantity, cart_date) VALUES ('$user_id', '$product_id', '1', NOW())";

    // Menjalankan query untuk menyimpan data
    if ($con->query($sql) === TRUE) {
        // Lakukan sesuatu dengan data yang diterima, seperti menyimpannya ke database atau menampilkan pesan sukses.
        // Contoh:
        echo "Produk berhasil ditambahkan ke keranjang.";
        // echo "Nama Lilin: $products_name <br>";
        // echo "Jumlah: $desc <br>";
        // echo "Harga: $price <br>";
        // echo "Bentuk: $stocks";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
