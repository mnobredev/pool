<?php
    $parseid = $_GET[data];
    $ids = explode("a", $parseid);
    $parseqty = $_GET[qty];
    $qtys = explode("a", $parseqty);
    $buyerid = $_GET[id];
    $bid = explode("a", $buyerid);
    $sql = "SELECT cart_id FROM cart where cart_user_id='".$buyerid[0]."' and cart_active=1;";
    $rs_result = mysqli_query ($conn, $sql);
    while ($row = mysqli_fetch_assoc($rs_result)){
        $cartid = $row[cart_id];
    }
    mysqli_query ($conn, "");
    for ($i=0; $i<count($ids); $i++){
        echo $ids[$i]." ";
        echo $qtys[$i]." ";
        echo $bid[$i]."<br>";        
    }
?>