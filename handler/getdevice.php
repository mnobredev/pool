<?php
include '../tools/chave.php';

    $devid = $_GET['device'];    

    $sql = mysqli_query ($conn, "select distinct DATE_FORMAT(date, '%m-%Y') as mmyyyy from readings where reading_device_id=$devid");
    while ($row = mysqli_fetch_assoc($sql)) {
        $ar[] = $row['mmyyyy'];
    }
    
    echo json_encode($ar);
    
    ?>