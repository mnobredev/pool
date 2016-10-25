<?php
    include '../tools/chave.php';
    $parseid = $_GET[data];
    $ids = explode("a", $parseid);
    $parseqty = $_GET[qty];
    $qtys = explode("a", $parseqty);
    $buyerid = $_GET[id];
    $rs_result = mysqli_query ($conn, "SELECT cart_id FROM cart where cart_user_id='".$buyerid."' and cart_active=1;");
    if (mysqli_num_rows($rs_result)!=0){
        while ($row = mysqli_fetch_assoc($rs_result)){
            $cartid = $row[cart_id];
            mysqli_query ($conn, "UPDATE cart SET cart_active=0 WHERE cart_id=$cartid;");
        }
    }
    mysqli_query ($conn, "INSERT INTO cart (cart_active, cart_data, cart_user_id) VALUES (true, NOW(), $buyerid);");
    $rs_result = mysqli_query ($conn, "SELECT cart_id FROM cart where cart_user_id='".$buyerid."' and cart_active=1;");
    while ($row = mysqli_fetch_assoc($rs_result)){
        $cartid = $row[cart_id];
    }
    
    for ($i=0; $i<count($ids); $i++){
        mysqli_query($conn, "INSERT INTO cartitem (cartitem_cart_id,cartitem_product_id, cartitem_quantity) VALUES ($cartid,$ids[$i],$qtys[$i])");       
    }
    $ar=Array("success");
    echo json_encode($ar);
?>