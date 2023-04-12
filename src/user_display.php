<?php
session_start();
$_SESSION["user"] = array();

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
switch ($operation) {
    
    case 'edit':
        $id = $_POST["id"];
        $sql = "SELECT * FROM datas WHERE `ID`='$id'";
        $result = mysqli_query($conn, $sql);
        print_r(json_encode(mysqli_fetch_assoc($result)));
        break;
    
    case 'update':
        $id = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $status = $_POST["status"];
        // print_r($id);
        // print_r($name);
        // print_r($email);
        // print_r($password);
        // print_r($status);
        $sql = "UPDATE `datas` SET `Names` = '$name', `Email` = '$email', `Status` = '$status' WHERE `datas`.`ID` = '$id';";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;

    case 'delete':
        $id = $_POST["id"];
        $sql = "DELETE FROM `datas` WHERE `datas`.`ID` = $id";
        $result = mysqli_query($conn, $sql);
        print_r($result);
        break;
    
    case 'display':
        $sql = "SELECT * FROM datas WHERE `Type`='customer'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0) {
            while ($data = mysqli_fetch_assoc($result)) {
                array_push($_SESSION["user"],$data);
            }
        }
        $txt = "";
        foreach ($_SESSION["user"] as $key => $value) {
            $txt .= "<tr><td>".$value["ID"]."</td><td>".$value["Names"]."</td><td>".$value["Email"]."</td><td>".$value["Status"]."</td><td><button class='btn bg-warning' onclick='edit_user(".$value["ID"].")'>EDIT</button></td><td><button class='btn bg-danger' onclick='delete_user(".$value["ID"].")'>DELETE</button></td></tr>";
        }
        echo $txt;
        break;

    default:
        # code...
        break;
}

?>