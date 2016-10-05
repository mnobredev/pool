<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'tools/chave.php'; // chave de login

$delete = mysqli_query($conn, "DROP TABLE sales");
$delete2 = mysqli_query($conn, "CREATE TABLE `sales` (
  `id_sale` int(11) NOT NULL,
  `nameitem` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
$delete3 = mysqli_query($conn, "SELECT *");