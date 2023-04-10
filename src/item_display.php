<?php
session_start();
$_SESSION["item"]=array();
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$val = $_POST["id"];

$sql = "SELECT `image`, `product_name`, `company`, `original_price`, `price` FROM product where `product_id`=$val";

$result = mysqli_query($conn, $sql);
$value = mysqli_fetch_assoc($result);
array_push($_SESSION["item"],$value);
?>