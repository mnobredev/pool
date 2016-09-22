<?php
echo "<script>console.log('ola');</script>";
if (isset($_POST["submitreg"])) {
    include 'chave.php'; // chave de login
    echo "<script>console.log('pça');</script>";
    $usertest = mysqli_query($conn, "Select email FROM user WHERE email = '" . $_POST['loginreg'] . "'");
    while ($row = mysqli_fetch_array($usertest)) {
        $result = $row['email'];

        if ($result == $_POST['loginreg']) {
            echo "<script type='text/javascript'>alert('Já existe este email registado!');</script>";
            /*header("Refresh:0");
            return;*/
        }
    }
    
    for ($i = 1; $i < 7; $i++) {
        if (preg_match('^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$', $POST_['mac'.$i.''])==0) {
            echo "<script type='text/javascript'>alert('Mac adress inválido!"+$i+"');</script>";
            /*header("Refresh:0");
            return;*/
        }
    }
    echo "<script>console.log('v2');</script>";
    $mac = "";
    for ($i = 1; $i < 7; $i++) {
        $mac.=$_POST['mac' . $i . ''] . ":";
        echo "<script>console.log('v1=".$mac."');</script>";
        if ($i == 6) {
            $mac.=$_POST['mac' . $i . ''];
        }
    }
    echo "<script>console.log('v1=".$mac."');</script>";
    $macverify = mysqli_query($conn, "Select device_mac FROM device WHERE device_mac = '" . $mac . "'");
    while ($row = mysqli_fetch_array($macverify)) {
        $result = $row['device_mac'];
        if ($result == $mac) {
            echo "<script type='text/javascript'>alert('Este MAC address já está registado!');</script>";
            header("Refresh:0");
            return;
        }
    }
    echo "<script>console.log('".$mac."');</script>";
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
