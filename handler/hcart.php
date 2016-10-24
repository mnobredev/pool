<?php

$id = $_GET['id'];

include '../tools/chave.php';

$sql = "SELECT cart_id FROM cart where cart_user_id='".$id."' and cart_active=1;";
$rs_result = mysqli_query ($conn, $sql);
if (mysqli_num_rows($rs_result)!=0){
        mysqli_query($conn, "INSERT INTO cart (cart_active, cart_data, cart_user_id) VALUES (true, NOW(), $id)");
        mysqli_query($conn, "INSERT INTO cart (cart_active, cart_data, cart_user_id) VALUES (true, NOW(), $id)");
        $cartalive = mysqli_query($conn, "select * from cart where cart_user_id=$id and cart_active=true");
    }
$sql = "SELECT cartitem_product_id, cartitem_quantity FROM cartitem where cartitem_cart_id=$cartid;";
$rs_result = mysqli_query ($conn, $sql);
$ar = [];
while ($row = mysqli_fetch_assoc($rs_result)){
    $ar[] = $row;
}
echo json_encode($ar);
?>