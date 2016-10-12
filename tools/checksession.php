<?php
session_start();
if (!$_SESSION["id"]){
    session_unset();
    session_destroy();
    header("location:../index.php");
}
else{
    $id = $_SESSION["id"];
    $sessionName = $_SESSION["name"];
}
?>