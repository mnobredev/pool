<?php

    while ($row = mysqli_fetch_array($sql1)) {
        $id_product = $row['id_product'];
    }
    $target_dir = "../img/store/";            
    $toupload = "id" . $id_product . "_1" . ".png";
    $target_file = $target_dir . $toupload;
    if (move_uploaded_file($_FILES["imgInp1"]["tmp_name"], $target_file)){
        $sqlImage1 = mysqli_query($conn,"INSERT into images (id_product, src_image) VALUES ('$id_product','$toupload')");
    }
    $toupload = "id" . $id_product . "_2" . ".png";
    $target_file = $target_dir . $toupload;
    if (move_uploaded_file($_FILES["imgInp2"]["tmp_name"], $target_file)){
        $sqlImage2 = mysqli_query($conn,"INSERT into images (id_product, src_image) VALUES ('$id_product','$toupload')");
    }
    $toupload = "id" . $id_product . "_3" . ".png";
    $target_file = $target_dir . $toupload;
    if (move_uploaded_file($_FILES["imgInp3"]["tmp_name"], $target_file)){
        $sqlImage3 = mysqli_query($conn,"INSERT into images (id_product, src_image) VALUES ('$id_product','$toupload')");
    }
?>