<?php
if (isset($_GET['id'])){
    $sessvar = $_GET['id'];
    session_start();
    $_SESSION["id"] = $sessvar;
    header("Location: ../paypal/checkout.php");
}
