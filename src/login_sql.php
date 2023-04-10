<?php
session_start();
$_SESSION["data"]=array();

// Login Page SQL 
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$mail = $_POST["mail"];
$pass = $_POST["password"];

$sql = "SELECT `ID`, `Names`, `Email`, `Passwords` FROM datas WHERE `Email`='$mail' and `Passwords`='$pass' and `Status`='approved'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
    $data = mysqli_fetch_assoc($result);
    array_push($_SESSION["data"],$data);
    $_SESSION["login"]=true;
    echo "success";
}

$u_id= $_SESSION["data"][0]["ID"];

$cart_sql = "SELECT `product_id`, `cart_quantity` FROM user_cart WHERE `ID`=$u_id";
$cart_result = mysqli_query($conn, $cart_sql);
if (mysqli_num_rows($cart_result) > 0) {
    while($cart = mysqli_fetch_assoc($cart_result)) {
        $_SESSION["cart"][$cart["product_id"]-1] += $cart["cart_quantity"];
    }
}

$wish_sql = "SELECT `product_id` FROM wishlist WHERE `ID`=$u_id";
$wish_result = mysqli_query($conn, $wish_sql);
if (mysqli_num_rows($wish_result) > 0) {
    while($wish = mysqli_fetch_assoc($wish_result)) {
        $_SESSION["wishlist"][$wish["product_id"]-1]++;
    }
}


$order_sql = "SELECT `product_id`, `order_quantity`, `order_status` FROM orders WHERE `ID`=$u_id";
$order_result = mysqli_query($conn, $order_sql);
if (mysqli_num_rows($order_result) > 0) {
    while($order = mysqli_fetch_assoc($order_result)) {
        array_push($_SESSION["order"],$order);
    }
}

// print_r($_SESSION["order"]);
// print_r($_SESSION["cart"]);
// print_r($_SESSION["wishlist"]);

// unset($_SESSION["cart"]);
// unset($_SESSION["wishlist"]);
?>