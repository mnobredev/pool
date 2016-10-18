<?php
    include "tools/chave.php";
    $idprod= intval($_GET['id']);
    $id= intval($_GET['sess']);
    $ar = [];
    $query = mysqli_query($conn, "select id_product, name_product, price_product from product where id_product=$idprod");
    while($row = mysqli_fetch_assoc($query)){
        //$ar = $row;
    }
    $cartalive = mysqli_query($conn, "select * from cart where cart_user_id=$id and cart_active=true");
    if (mysqli_num_rows($cartalive)==0){
        mysqli_query($conn, "INSERT INTO cart (cart_active, cart_data, cart_user_id) VALUES (true, NOW(), $id)");
        $cartalive = mysqli_query($conn, "select * from cart where cart_user_id=$id");
    }
    while($row = mysqli_fetch_assoc($cartalive)){
        $cartid = $row['cart_id'];
    }
    mysqli_query($conn, "INSERT INTO cartitem (cartitem_cart_id,cartitem_product_id, cartitem_quantity) VALUES ($cartid,$idprod,1)");
    
    $query = mysqli_query($conn, "select * from cartitem where cartitem_cart_id=$cartid");
    while($row = mysqli_fetch_assoc($query)){
        $ar [] = $row;
    }
    
    echo json_encode($ar);
?>