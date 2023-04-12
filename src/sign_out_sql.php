<?php
session_start();

$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// print_r($_SESSION["login"]);
foreach ($_SESSION["cart"] as $key => $value) {
    $id = $_SESSION["data"][0]["ID"];
    $prod_id =  $key+1;
    $quant = $_SESSION["cart"][$key];
    $sql = "INSERT INTO `user_cart` (`ID`, `product_id`, `cart_quantity`) VALUES ('$id', '$prod_id', '$quant')";
    $stmt = mysqli_query($conn, $sql);
}

foreach ($_SESSION["wishlist"] as $key => $value) {
    $id = $_SESSION["data"][0]["ID"];
    $prod_id =  $key+1;
    $sql = "INSERT INTO `wishlist` (`ID`, `product_id`) VALUES ('$id', '$prod_id')";
    $stmt = mysqli_query($conn, $sql);
}

unset($_SESSION["cart"]);
unset($_SESSION["wishlist"]);
unset($_SESSION["order"]);
?>