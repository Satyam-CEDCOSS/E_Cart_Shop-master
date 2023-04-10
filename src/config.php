<?php
session_start();
$_SESSION["display"]=array();
if (!isset($_SESSION["cart"])){
    $_SESSION["cart"]=array();
}
if (!isset($_SESSION["wishlist"])){
    $_SESSION["wishlist"]=array();
}
if (!isset($_SESSION["order"])){
    $_SESSION["order"]=array();
}
if (!isset($_SESSION["login"])){
    $_SESSION["login"]=false;
}
?>