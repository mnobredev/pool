<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../tools/chave.php';
$str = mysqli_query($conn, "Select * from cart");

while($row = mysqli_fetch_assoc($str))
{
    print_r($row);
}
/*
$str2 = mysqli_query($conn, "Select cartitem_product_id from cartitem WHERE cartitem_cart_id=".$cartid);
while($row = mysqli_fetch_array($str2))
{
    
}
echo $row;*/