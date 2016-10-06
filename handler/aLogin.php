<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$login = $_REQUEST['email'];
$result5 ="";
$result5 = $login;
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
    $sql1 = mysqli_query($conn, "SELECT first_name,tel,zipcode,city,last_name, address FROM customer WHERE customer_user_id = '".$result1."'");
    $result3 ="";
    $result4 ="";
    $result6 ="";
    $result7 ="";
    $result8 ="";
    $result9 ="";
    while($row1 = mysqli_fetch_array($sql1))
    {
        $result3 = $row1['first_name']; 
        $result4 = $row1['last_name'];
        $result6 = $row1['address'];
        $result7 = $row1['tel'];
        $result8 = $row1['city'];
        $result9 = $row1['zipcode'];
    }
    $login1="";
    if(password_verify($pw, $result)){
        $login1=true;
        $ar = array($login1, $result1, $result3, $result4, $result5, $result6,$result7,$result8,$result9);
        echo json_encode($ar);
    }
?>
