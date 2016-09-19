<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_REQUEST['id_data'];

        include '../chave.php';

        $sql = "select * from readings where DATE_FORMAT(date, '%m-%Y') like '%$id%';"; 
        $rs_result = mysqli_query ($conn, $sql);

        $ar = [];
        while ($row = mysqli_fetch_assoc($rs_result))
        $ar[] = $row;

        echo json_encode($ar);
