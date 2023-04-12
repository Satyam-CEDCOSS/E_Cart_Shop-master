<?php
session_start();
$_SESSION["top_user"] = array();
$_SESSION["top_order"] = array();
$_SESSION["top_product"] = array();
// Admin Page Display 
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$operation = $_POST["operation"];

switch ($operation) {
    case 'top_user':
        $sql = "SELECT `ID`, `Names`, `Email`, `Status` FROM datas WHERE ID IN (SELECT `ID` FROM orders WHERE datas.ID=orders.ID ORDER BY order_quantity  DESC) LIMIT 5";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            while ($data = mysqli_fetch_assoc($result)) {
                array_push($_SESSION["top_user"],$data);
            }
        }
        $txt = "";
        foreach ($_SESSION["top_user"] as $key => $value) {
            $txt .= "<tr><td>".$value["ID"]."</td><td>".$value["Names"]."</td><td>".$value["Email"]."</td><td>".$value["Status"]."</td></tr>";
        }
        echo $txt;
        break;

    case 'top_product':
        $sql = "SELECT `product_id`,`product_name`,`company`,`type`,`quantity`,`price` FROM product WHERE product_id IN (SELECT `product_id` FROM orders WHERE product.product_id=orders.product_id ORDER BY order_quantity DESC) LIMIT 5";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            while ($data = mysqli_fetch_assoc($result)) {
                array_push($_SESSION["top_product"],$data);
            }
        }
        $txt = "";
        foreach ($_SESSION["top_product"] as $key => $value) {
            $txt .= "<tr><td>".$value["product_id"]."</td><td>".$value["product_name"]."</td><td>".$value["quantity"]."</td><td>".$value["company"]."</td><td>".$value["type"]."</td><td>".$value["price"]."</td></tr>";
        }
        echo $txt;
        break;

    case 'top_order':
        $sql = "SELECT product_id,order_status,SUM(order_quantity) FROM orders GROUP BY product_id,order_status ORDER BY SUM(order_quantity) DESC LIMIT 5;
        ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            while ($data = mysqli_fetch_assoc($result)) {
                array_push($_SESSION["top_order"],$data);
            }
        }
        $txt = "";
        foreach ($_SESSION["top_order"] as $key => $value) {
            $txt .= "<tr><td>".$value["product_id"]."</td><td>".$value['SUM(order_quantity)']."</td><td>".$value["order_status"]."</td></tr>";
        }
        echo $txt;
        break;
    
    default:
        break;
}

?>