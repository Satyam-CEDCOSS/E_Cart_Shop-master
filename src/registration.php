<?php
// Registration page SQL 
$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST["name"];
$mail = $_POST["mail"];
$password = $_POST["password"];
$sql = "INSERT INTO `datas` (`ID`, `Names`, `Email`, `Passwords`) VALUES (NULL, '$name', '$mail', '$password')";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "success";
}
?>