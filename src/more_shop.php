<?php
session_start();
if($_SESSION["login"]==false){
    echo "SignOut";
}
else{
    echo "SignIn";
}
?>