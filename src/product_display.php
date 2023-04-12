<?php
session_start();
$_SESSION["product"] = array();

// USER INFO Page Display 
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$operation = $_POST["operation"];
// print_r($operation);
// die;
switch ($operation) {
    
    case 'add':
        // echo "hello";
        $name = $_POST["name"];
        $company = $_POST["company"];
        $type= $_POST["type"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $market_price = $_POST["market_price"];
        $image = $_POST["image"];
        $sql = "INSERT INTO `product` (`product_id`, `product_name`, `company`, `type`, `quantity`, `price`, `original_price`, `image`) VALUES (NULL, '$name', '$company', '$type', '$quantity', '$price', '$market_price', '$image')";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;

    case 'edit':
        $id = $_POST["id"];
        $sql = "SELECT * FROM product WHERE `product_id`='$id'";
        $result = mysqli_query($conn, $sql);
        print_r(json_encode(mysqli_fetch_assoc($result)));
        break;

    case 'update':
        $id = $_POST["id"];
        $name = $_POST["name"];
        $company = $_POST["company"];
        $type= $_POST["type"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $market_price = $_POST["market_price"];
        $image = $_POST["image"];
        $sql = "UPDATE `product` SET `product_name` = '$name', `company` = '$company', `type` = '$type', `quantity` = '$quantity', `price` = '$price', `original_price` = '$market_price', `image` = '$image' WHERE `product`.`product_id` = $id";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;

    case 'delete':
        $id = $_POST["id"];
        $sql = "DELETE FROM `product` WHERE `product`.`product_id` = $id";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;
    
    case 'display':
        $sql = "SELECT * FROM product";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            while ($data = mysqli_fetch_assoc($result)) {
                array_push($_SESSION["product"],$data);
            }
        }
        $txt = "";
        foreach ($_SESSION["product"] as $key => $value) {
            $txt .= "<tr><td>".$value["product_id"]."</td><td>".$value["product_name"]."</td><td>".$value["company"]."</td><td>".$value["type"]."</td><td>".$value["quantity"]."</td><td>".$value["price"]."</td><td>".$value["original_price"]."</td><td>".$value["image"]."</td><td><button class='btn bg-warning' onclick='edit_product(".$value["product_id"].")'>EDIT</button></td><td><button class='btn bg-danger' onclick='delete_product(".$value["product_id"].")'>DELETE</button></td></tr>";
        }
        echo $txt;
        break;

    default:
        # code...
        break;
}

?>