<?php
include "../tools/chave.php";
 if(isset($_GET["table"])){
     $table = $_GET["table"];
     $query="SELECT * from $table";
}

$sql = mysqli_query($conn, $query);
$ar = Array();
while ($row = mysqli_fetch_array($sql)) {   
    $ar [] = $row;
}

echo json_encode($ar);