<?php
session_start();
$val = $_POST["id"];
switch ($_POST["operation"]) {
    case 'add':
        $_SESSION["cart"][$val]++;
        break;
    case 'inc':
        $_SESSION["cart"][$val]++;
        break;
    case 'dec':
        if ($_SESSION["cart"][$val]>1){
            $_SESSION["cart"][$val]--;
        }
        else{
            unset($_SESSION["cart"][$val]);
        }
        break;
    case 'del':
        unset($_SESSION["cart"][$val]);
        break;
    default:
        break;
}
?>