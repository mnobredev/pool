<?php
session_start();
if (!$_SESSION["id"] || $_SESSION["auth"]!=2){
    session_unset();
    session_destroy();
    header("location:../admin/admin.php");
}
else{
    $id = $_SESSION["id"];
    $sessionName = $_SESSION["name"];
}
?>