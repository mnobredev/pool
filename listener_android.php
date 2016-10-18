<?php

    $field = $_REQUEST['field'];
    $data = $_REQUEST['data'];
    $id = $_REQUEST['id'];
    $val = 0;

    include 'tools/chave.php';
    $sql = "UPDATE customer SET " . $field . "='" . $data . "' where customer_user_id='" . $id . "'";
    $hello = mysqli_query($conn, $sql);
    
    if ($hello=="1"){
        $ar = Array("success");
    echo json_encode($ar);}
?>