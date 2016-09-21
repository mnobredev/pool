<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$id = $_REQUEST['email'];
include 'chave.php';

        $user = mysqli_query ($conn, "Select user_id from user where email='".$id."'");
        while ($row = mysqli_fetch_array($user)) {
        $result = $row['user_id'];
    }
   
        $sql = "select address, city, first_name, last_name, zipcode from customer where customer_id='".$result."'"; 
        $rs_result = mysqli_query ($conn, $sql);
        
        $ar = [];
        
        while ($row2 = mysqli_fetch_array($rs_result))
        {
            $ar[] = $row2;
        }
        //$ar[] = $row;

        echo json_encode($ar);
        
        ?>