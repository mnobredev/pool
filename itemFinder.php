<?php


include "tools/chave.php";
$id= intval($_GET['id']);

$query = mysqli_query($conn, "select * from product where id_product=".$id);
 while($row = mysqli_fetch_array($query))
            {
                $result = $row['id_product'];
            }

  
echo $result;
  