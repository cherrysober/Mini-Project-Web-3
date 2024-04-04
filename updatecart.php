<?php
include_once "config.php";

if ($_SERVER['HTTP_HX_REQUEST'] != 'true') {
    http_response_code(404);
    exit;
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    if (isset($_POST['quantity'])) {
        $qty = $_POST['quantity'];
        $sql = "UPDATE cart SET quantity = '$qty' WHERE id_users = '$user_id' AND id_products = '$product_id'";
    } else if (isset($_GET['checkbox'])) {
        $checked = 0;
        if (isset($_POST['checked'])) {
            $checked = 1;
        }
        $sql = "UPDATE cart SET checked = '$checked' WHERE id_users = '$user_id' AND id_products = '$product_id'";
    }

    // Menjalankan query untuk menyimpan data
    if ($con->query($sql) === TRUE) {
        // Lakukan sesuatu dengan data yang diterima, seperti menyimpannya ke database atau menampilkan pesan sukses.
        // Contoh:
        echo "Produk berhasil diupdate.";
        // echo "Nama Lilin: $products_name <br>";
        // echo "Jumlah: $desc <br>";
        // echo "Harga: $price <br>";
        // echo "Bentuk: $stocks";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
