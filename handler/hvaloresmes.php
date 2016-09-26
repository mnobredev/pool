<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_REQUEST['mesano'];

        include '../tools/chave.php';

        $sql = "SELECT ph_status, chlorine_status,DAY(date) as day, HOUR(date) as hour, MINUTE(date) as minute FROM readings where DATE_FORMAT(date, '%m-%Y') like '%$id%';"; 
        $rs_result = mysqli_query ($conn, $sql);

        $ar = [];
        while ($row = mysqli_fetch_assoc($rs_result))
        $ar[] = $row;

        echo json_encode($ar);
?>