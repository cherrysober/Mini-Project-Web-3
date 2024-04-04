<?php
require "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .empty-message {
            text-align: center;
            margin-top: 20px;
            color: red;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Invoice</h1>
    <?php
    $query = "SELECT * FROM invoice";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>
                <tr>
                    <th>ID Invoice</th>
                    <th>ID Users</th>
                    <th>ID Products</th>
                    <th>Quantity</th>
                    <th>Item Price</th>
                    <th>Subtotal</th>
                    <th>Invoice Date</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>".$row['id_invoice']."</td>
                    <td>".$row['id_users']."</td>
                    <td>".$row['id_products']."</td>
                    <td>".$row['quantity']."</td>
                    <td>".$row['item_price']."</td>
                    <td>".$row['subtotal']."</td>
                    <td>".$row['invoice_date']."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='empty-message'>Tidak ada data invoice.</p>";
    }

    mysqli_close($con);
    ?>
    <div class="back-link">
        <a href="index.php">Back to Home</a>
    </div>
</div>

</body>
</html>
