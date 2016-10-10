<?php
    $myID = $_REQUEST['id'];
    $newPassword = $_REQUEST['password'];
    $options = [
            'cost' => 11,
            'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
        $password_hash1 = password_hash($newPassword, PASSWORD_BCRYPT, $options);
    
    $sql = mysqli_query($conn,"UPDATE user set password='".$password_hash1."' where user_id=".$myID."");
?>
