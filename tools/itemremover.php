<?php
    include "chave.php";
    $idprod= intval($_GET['id']);
    $id= intval($_GET['sess']);
    $ar = [];
    $cartalive = mysqli_query($conn, "select * from cart where cart_user_id=$id and cart_active=true");
    while($row = mysqli_fetch_assoc($cartalive)){
        $cartid = $row['cart_id'];
    }
    mysqli_query($conn, "DELETE FROM cartitem where cartitem_product_id=$idprod and cartitem_cart_id=$cartid LIMIT 1");
    
    $query = mysqli_query($conn, "select id_product, name_product, price_product from product left join cartitem on cartitem_product_id=id_product where cartitem_cart_id=$cartid");
    while($row = mysqli_fetch_assoc($query)){
        $ar [] = $row;
    }
    
    echo json_encode($ar);
?>