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
            
            $sql = "SELECT ph_status, chlorine_status,DAY(date) as day, HOUR(date) as hour, MINUTE(date) as minute FROM readings where DATE_FORMAT(date, '%m-%Y') like '%$mesano%' and  reading_device_id='$devid';";
            $res1 [] = "";
            $res2 [] = "";
            $res3 [] = "";
            $res4 [] = "";
            $res5 [] = "";

            $rs_result = mysqli_query ($conn, $sql);
            $ar = [];
            $tempar = [];
            while ($row = mysqli_fetch_assoc($rs_result)){
                
            $res1['ph_status'] = $row['ph_status'];
            $res2['chlorine_status'] = $row['chlorine_status'];
            $res3['day'] = $row['day'];
            $res4['hour'] = $row['hour'];
            $res5['minute'] = $row['minute'];
            array_push($tempar,$res1,$res2,$res3,$res4,$res5);
            array_push($ar,$tempar);
            $tempar = [];
            }

            echo json_encode($ar);
         }
         else{
            $sql = "SELECT ph_status, chlorine_status,DAY(date) as day, HOUR(date) as hour, MINUTE(date) as minute FROM readings where DATE_FORMAT(date, '%m-%Y') like '%$mesano%' and  reading_device_id='$devid';";

            $rs_result = mysqli_query ($conn, $sql);

            $ar = [];
            while ($row = mysqli_fetch_assoc($rs_result))
            $ar[] = $row;

            echo json_encode($ar);
             
         }
?>