<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$mesano = $_GET['mesano'];
$devid = $_GET['dev'];

        include '../tools/chave.php';
        if($_GET['android']=="true"){
            

         }
         else{
             
            $sql = "SELECT ph_status, chlorine_status,DAY(date) as day, HOUR(date) as hour, MINUTE(date) as minute FROM readings where DATE_FORMAT(date, '%m-%Y') like '%$mesano%' and  reading_device_id='$devid';";
            $rs_result = mysqli_query ($conn, $sql);

            $ar = [];
            while ($row = mysqli_fetch_assoc($rs_result)){
                $ar[] = $row;
            }
            echo json_encode($ar);
             
                         
         }
?>