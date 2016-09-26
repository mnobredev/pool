<?php

if (isset($_POST["submitreg"])) {
    include 'chave.php'; // chave de login
    $haserror=0;
    $usertest = mysqli_query($conn, "Select email FROM user WHERE email = '" . $_POST['loginreg'] . "'");
    while ($row = mysqli_fetch_array($usertest)) {
        $result = $row['email'];

        if ($result == $_POST['loginreg']) {
            echo "<script type='text/javascript'>window.onload = function() { $('#newAccount').modal();document.getElementById('emaillabel').innerHTML += ' <small style=\'color: #cc0000;\'>Este cliente já tem uma conta activa.</small>';}</script>";
            $haserror=1;
        }
    }
   
    $mac = "";
    for ($i = 1; $i < 7; $i++) {
        $mac.=$_POST['mac' . $i . ''] . ":";
        echo "<script>console.log('v1=".$mac."');</script>";
        if ($i == 6) {
            $mac.=$_POST['mac' . $i . ''];
        }
    }

    $macverify = mysqli_query($conn, "Select device_mac FROM device WHERE device_mac = '" . $mac . "'");
    while ($row = mysqli_fetch_array($macverify)) {
        $result = $row['device_mac'];
        if ($result == $mac) {
            echo "<script type='text/javascript'>window.onload = function() { $('#newAccount').modal();document.getElementById('maclabel').innerHTML += ' <small style=\'color: #cc0000;\'>Este equipamento já tem conta associada.</small>';}</script>";
            $haserror=1;
        }
    }
    if ($haserror==0){
    $options = [
        'cost' => 11,
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    $password_hash1 = password_hash($_POST['passreg'], PASSWORD_BCRYPT, $options);

    $sql = mysqli_query($conn, "Insert into user(user_type, email, password) VALUES('1','" . $_POST['loginreg'] . "', '$password_hash1' )");
    $sql1 = mysqli_query($conn, "SELECT user_id FROM user WHERE email = '" . $_POST['loginreg'] . "'");

    while ($row = mysqli_fetch_array($sql1)) {
        $result = trim($row['user_id']);
    }
    $auth = "0";
    $sql2 = mysqli_query($conn, "Insert into device(device_user_id, device_mac, auth) VALUES ('" . $result . "','" . $mac . "','" . $auth . "')");
    $sql3 = mysqli_query($conn, "Insert into customer(address, city, customer_user_id, first_name, last_name, zipcode) VALUES ('" . $_POST['Address'] . "', '" . $_POST['City'] . "','" . $result . "' ,'" . $_POST['Fname'] . "' , '" . $_POST['Lname'] . "', '" . $_POST['Cpostal'] . "')");

    }
    }
?>

<div class="modal fade" id="newAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registo de novo Utilizador</h4>
      </div>
      <form method="POST" action="">
      <div class="modal-body">
        <?php
        include 'newuser.php';
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" id="submitreg" name="submitreg" value="submitreg" class="btn btn-primary">Guardar</button>
      </div>
     </form>
    </div>
  </div>
</div>