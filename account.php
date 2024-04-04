<?php
include "config.php";
require "session.php";

// Variabel untuk menyimpan path file gambar profil
$profile_picture_path = "";

// Memeriksa apakah form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_picture"])) {
    // Menyiapkan direktori untuk menyimpan file gambar
    $target_dir = "images/";

    // Menyiapkan nama file baru dengan ekstensi yang sesuai
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);

    // Memeriksa apakah file yang diunggah adalah file gambar
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_extensions = array("jpg", "jpeg", "png", "gif");
    if (in_array($imageFileType, $allowed_extensions)) {
        // Memindahkan file gambar yang diunggah ke direktori tujuan
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $profile_picture_path = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Spectral', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('images/bg-2.jpg'); 
            background-size: cover; 
        }

        .container {
            text-align: center;
        }

        .box {
            width: 400px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        header {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .field {
            width: 380px;
            margin-bottom: 20px;
            justify-content: center;
            align-items: center;
            margin-left: auto;
            margin-right: auto; 
        }


        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #fd7e14;
            color: #ffffff;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #e76704;
        }

        .message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        #profile_picture_preview {
            margin-top: 20px;
        }

        #profile_picture_preview img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box">
            <?php
            // Memeriksa apakah session 'username' ada
            if (isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                // Atur $username menjadi string kosong jika session tidak ada
                $username = "";
            }

            // Mengambil dan menampilkan email pengguna
            $ambildata = mysqli_query($con, "SELECT username FROM users");
            while ($tampil = mysqli_fetch_array($ambildata)) {
                $username = $tampil['username'];
                echo "<header>Welcome, $username!</header>";
            }
            ?>
            <!-- Form unggah foto profil -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="field">
                    <label for="profile_picture">Upload Profile Picture</label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="upload" value="Upload">
                </div>
            </form>
            <!-- Menampilkan foto profil jika ada -->
            <?php if (!empty($profile_picture_path)) : ?>
                <div class="field" id="profile_picture_preview">
                    <img src="<?php echo $profile_picture_path; ?>" alt="Profile Picture" style="width: 150px; height: 150px; border-radius: 50%;">
                </div>
            <?php endif; ?>
            <!-- Menampilkan email pengguna -->
            <?php
            $ambildata = mysqli_query($con, "SELECT email FROM users");
            while ($tampil = mysqli_fetch_array($ambildata)) {
                $email = $tampil['email'];
                echo "<p>Your Email: $email</p>";
            }
            ?>
            <!-- Tautan kembali ke halaman utama -->
            <p><a href="index.php">Back to Home</a></p>
            <!-- Tautan untuk keluar -->
            <p><a href="logout.php">Not you? Log out</a></p>
        </div>
    </div>
</body>

</html>