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

if ($_SESSION["login"]==1){
    foreach ($_SESSION["cart"] as $key => $value) {
        $id = $_SESSION["data"][0]["ID"];
        $prod_id =  $key+1;
        $quant = $_SESSION["cart"][$key];
        $sql = "INSERT INTO `orders` (`ID`, `product_id`, `order_quantity`, `order_status`) VALUES ('$id', '$prod_id', '$quant', 'Placed')";
        $stmt = mysqli_query($conn, $sql);
    }
    echo 'Success';
    unset($_SESSION["cart"]);
    
}
else{
    echo "login";
}

?>
