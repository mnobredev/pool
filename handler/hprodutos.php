<?php


include '../tools/chave.php';

$sql = "SELECT product.id_product, name_product, price_product, quantity_product, category_product, parent_category, description_product, src_image FROM product left join category on category_product=id_category left join images on images.id_product=product.id_product";
$rs_result = mysqli_query ($conn, $sql);
$ar = [];
while ($row = mysqli_fetch_assoc($rs_result)){
    $ar[] = $row;
}
echo json_encode($ar);
?>