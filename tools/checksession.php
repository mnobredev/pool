<?php

if (!$_SESSION["id"]){
    session_destroy();
    header("location:../index.php");
}
?>