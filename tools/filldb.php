<?php
include 'chave.php';
if (isset($_GET["id"])){
    $date = new DateTime("2016-08-31");
    $today = new DateTime("2016-10-26 15:00:00");
    echo $today->format('Y-m-d H:i:s');
    while ($date->format('Y-m-d H:i:s')<$today->format('Y-m-d H:i:s')){
    $mac=$_GET["id"];
    $cloro= (rand(50,120))/100;
    $ph= (rand(690,730))/100;
    $temp= (rand(21000,24000))/1000;
    $date->modify('+10 minute');
    $mysqltime = $date->format('Y-m-d H:i:s');
    echo $date->format('Y-m-d H:i:s');
    echo $cloro."<br>";
    echo $ph."<br>";
    echo $temp."<br>";
    mysqli_query ($conn,"INSERT INTO readings (reading_device_id, chlorine_status, ph_status, temperature, date) VALUES ('$mac', '$cloro', '$ph', '$temp', '$mysqltime');");
    }
}