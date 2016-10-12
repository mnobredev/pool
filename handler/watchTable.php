<?php
include "../tools/chave.php";
if(isset($_GET["table"])){
    $table = $_GET["table"];
    $query="SELECT * from $table";
    if(isset($_GET["where"])){
        $where = $_GET["where"];
        $equals = $_GET["equals"];
        $query="SELECT * from $table where $where=$equals";
    }
}
if(isset($_GET["describe"])){
    $describe = $_GET["describe"];
    $query="DESCRIBE $describe";
}

$sql = mysqli_query($conn, $query);
$ar = Array();
while ($row = mysqli_fetch_array($sql)) {   
    $ar [] = $row;
}

echo json_encode($ar);