<?php
session_start();
$val = $_POST["id"];
switch ($_POST["operation"]) {
    case 'add':
        $_SESSION["wishlist"][$val]++;
        print_r($_SESSION["wishlist"]);
        break;
    case 'del':
        unset($_SESSION["wishlist"][$val]);
        break;
    default:
        break;
}
?>