<?php
include("config.php");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];
    $address = $_POST['address']; // Ambil nilai alamat dari formulir
    $phone = $_POST['phone']; // Ambil nilai nomor handphone dari formulir
    $regist_date = date('Y-m-d H:i:s'); // Ambil nilai tanggal registrasi dari formulir

    // Verifikasi email unik
    $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");
    if(mysqli_num_rows($verify_query) != 0){
        $error_message = "This email is used, try another one please!";
    } else {
        mysqli_query($con,"INSERT INTO users(Username, Email, Age, Password, Address, Phone, Regist_Date) VALUES('$username','$email','$age','$password','$address','$phone','$regist_date')") or die("Error Occurred");
        $_SESSION['user_id'] = mysqli_insert_id($con);
        header("Location: account.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Spectral', sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/bg-2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-y: auto;
        }
        .form-container {
            width: 450px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8); /* Ubah nilai opacity sesuai kebutuhan */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative; /* Tambahkan ini agar tanda kembali bisa ditempatkan dengan tepat */
            margin: 0 auto;
        }
        .form-header {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .form-field {
            margin-bottom: 20px;
        }
        .form-field label {
            display: block;
            margin-bottom: 5px;
        }
        .form-field input[type="text"],
        .form-field input[type="password"],
        .form-field input[type="number"],
        .form-field input[type="file"],
        .form-field textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block; /* Tambahkan ini untuk membuat input teks berada di bawah label */
        }
        .form-field input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #fd7e14;
            color: #ffffff;
            cursor: pointer;
        }
        .form-field input[type="submit"]:hover {
            background-color: #e76704;
        }
        .form-links {
            text-align: center;
            margin-top: 15px;
        }
        .form-links a {
            color: #007bff;
            text-decoration: none;
        }
        .form-links a:hover {
            text-decoration: underline;
        }
        .message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
        }
        .back-link {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 20px;
            text-decoration: none;
            color: #e76704;
        }
    </style>
    <title>Register</title>
</head>
<body>
    <div class="form-container">
        <a href="index.php" class="back-link">&#8592; homepage</a>
        <div class="form-header">Sign Up</div>
        <form action="" method="post">
            <div class="form-field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </div>
            <div class="form-field">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" required>
            </div>
            <div class="form-field">
                <label for="age">Age</label>
                <input type="number" name="age" id="age" autocomplete="off" required>
            </div>
            <div class="form-field">
                <label for="address">Address</label>
                <textarea name="address" id="address" rows="4" required></textarea>
            </div>
            <div class="form-field">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" autocomplete="off" required>
            </div>
            <!-- Tambahkan hidden input field untuk menyimpan tanggal registrasi -->
            <input type="hidden" name="regist_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <div class="form-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </div>
            <div class="form-field">
                <input type="submit" class="btn" name="submit" value="Register">
            </div>
            <?php if(isset($error_message)): ?>
            <div class="message">
                <p><?php echo $error_message; ?></p>
            </div>
            <?php endif; ?>
            <div class="form-links">
                Already a member? <a href="login.php">Log In</a>
            </div>
        </form>
    </div>
</body>
</html>