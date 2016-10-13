<?php


include "tools/chave.php";
$id= intval($_GET['id']);

$query = mysqli_query($conn, "select * from product where id_product=".$id);
 while($row = mysqli_fetch_array($query))
            {
                $result = $row['id_product'];
                $result1 = $row['name_product'];
                $result2 = $row['price_product'];
            }

  
echo $result."&".$result1."&".$result2;
  