<?php

$id = $_GET['id'];

include '../tools/chave.php';

$sql = "SELECT cart_id FROM cart where cart_user_id='".$id."' and cart_active=1;";
$rs_result = mysqli_query ($conn, $sql);
while ($row = mysqli_fetch_assoc($rs_result)){
    $cartid = $row[cart_id];
}
$sql = "SELECT cartitem_product_id, cartitem_quantity FROM cartitem where cartitem_cart_id=$cartid;";
$rs_result = mysqli_query ($conn, $sql);
$ar = [];
while ($row = mysqli_fetch_assoc($rs_result)){
    $ar[] = $row;
}
echo json_encode($ar);
?>