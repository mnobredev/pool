<?php
    include "tools/chave.php";
    $id= intval($_GET['id']);
    $ar = [];
    $query = mysqli_query($conn, "select id_product, name_product, price_product from product where id_product=".$id);
    while($row = mysqli_fetch_assoc($query)){
        $ar = $row;
    }
    echo json_encode($ar);
?>