<?php

$device = $_GET['device'];

include '../tools/chave.php';

$sql = "SELECT alert_date, alert_type FROM alert where device_id='".$device."';";
$rs_result = mysqli_query ($conn, $sql);
$ar = [];
while ($row = mysqli_fetch_assoc($rs_result)){
    $ar[] = $row;
}
echo json_encode($ar);
?>


