<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$login = $_REQUEST['email'];
$pw = $_REQUEST['pass'];

include '../tools/chave.php';

    $sql = mysqli_query($conn, "SELECT password, user_id FROM user WHERE email = '".$login."'");
    $result ="";
    $result1 ="";
    while($row = mysqli_fetch_array($sql))
    {
        $result = $row['password'];
        $result1 = $row['user_id']; 
    }
    $sql1 = mysqli_query($conn, "SELECT first_name, last_name FROM customer WHERE customer_user_id = '".$result1."'");
    $result3 ="";
    $result4 ="";
    while($row1 = mysqli_fetch_array($sql1))
    {
        $result3 = $row1['first_name']; 
        $result4 = $row1['last_name'];
    }
    $login1="";
    if(password_verify($pw, $result)){
        $login1=true;
       $ar = array($login1, $result1, $result3, $result4);
        echo json_encode($ar);
    }
?>
