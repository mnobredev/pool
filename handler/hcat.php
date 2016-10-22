<?php

include '../tools/chave.php';

$sql = "SELECT id_category,parent_category,name_category FROM category;";
$rs_result = mysqli_query ($conn, $sql);
$ar = [];
while ($row = mysqli_fetch_assoc($rs_result)){
    $ar[] = $row;
}
echo json_encode($ar);
?>