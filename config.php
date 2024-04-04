<?php

session_start();

$host = "localhost";
$user = "root";
$password = "";
$database = "candle_store";

$con = mysqli_connect($host, $user, $password, $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
