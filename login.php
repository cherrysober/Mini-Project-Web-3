<?php
include("config.php");


// if(isset($_POST['submit'])){
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $query = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password'");

//     if(mysqli_num_rows($query) == 1){
//         // Set cookie untuk menyimpan informasi login
//         $user_data = mysqli_fetch_assoc($query);
//         setcookie('user_id', $user_data['ID'], time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
//         setcookie('user_email', $user_data['Email'], time() + (86400 * 30), "/");
//         header("Location: account.php");
//         exit();
//     } else {
//         echo "<div class='message'>
//                 <p>Invalid email or password!</p>
//               </div>";
//     }
// }
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
            height: 100vh;
        }

        .form-container {
            width: 400px;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8);
            /* Ubah nilai opacity sesuai kebutuhan */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            /* Tambahkan ini agar tanda kembali bisa ditempatkan dengan tepat */
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
        .form-field input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    <title>Login</title>
</head>

<body>
    <div class="form-container">
        <a href="index.php" class="back-link">&#8592; homepage</a>
        <div class="form-header">Login</div>
        <?php
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = mysqli_query($con, "SELECT * FROM users WHERE Email='$email' AND Password='$password'");

            if (mysqli_num_rows($query) == 1) {
                // Set cookie untuk menyimpan informasi login
                $user_data = mysqli_fetch_assoc($query);
                setcookie('user_id', $user_data['ID'], time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
                setcookie('user_username', $user_data['Username'], time() + (86400 * 30), "/");
                setcookie('user_email', $user_data['Email'], time() + (86400 * 30), "/");
                $_SESSION['user_id'] = $user_data['id']; // Tambahkan ini untuk menyimpan ID user ke dalam session
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['login'] = true;
                header("Location: account.php");
                exit();
            } else {
                echo "<div class='message'>
                            <p>Invalid email or password!</p>
                          </div>";
            }
        }
        ?>
        <form action="" method="post">
            <div class="form-field">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" autocomplete="off" required>
            </div>
            <div class="form-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </div>
            <div class="form-field">
                <input type="submit" class="btn" name="submit" value="Login" required>
            </div>
            <div class="form-links">
                Don't have an account? <a href="register.php">Register now</a>
            </div>
        </form>
    </div>
</body>

</html>