<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_POST["submit"])) {
    include 'chave.php'; // chave de login

    $usertest = mysqli_query($conn, "Select email FROM user WHERE email = '" . $_POST['login'] . "'");
    while ($row = mysqli_fetch_array($usertest)) {
        $result = $row['email'];

        if ($result == $_POST['login']) {
            echo "<script type='text/javascript'>alert('Já existe este email registado!');</script>";
            header("Refresh:0");
            return;
        }
    }

    for ($i = 1; $i < 7; $i++) {
        if (!ctype_xdigit($_POST['mac' . $i . ''])) {
            echo "<script type='text/javascript'>alert('Mac adress inválido!');</script>";
            header("Refresh:0");
            return;
        }
    }

    $mac = "";
    for ($i = 1; $i < 7; $i++) {
        $mac.=$_POST['mac' . $i . ''] . ":";
        if ($i == 6) {
            $mac.=$_POST['mac' . $i . ''];
        }
    }
    echo $mac;
    
    $macverify = mysqli_query($conn, "Select device_mac FROM device WHERE device_mac = '" . $mac . "'");
    while ($row = mysqli_fetch_array($macverify)) {
        $result = $row['device_mac'];
        if ($result == $mac) {
            echo "<script type='text/javascript'>alert('Este MAC address já está registado!');</script>";
            header("Refresh:0");
            return;
        }
    }

    $options = [
        'cost' => 11,
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    $password_hash1 = password_hash($_POST['pass'], PASSWORD_BCRYPT, $options);

    $sql = mysqli_query($conn, "Insert into user(user_type, email, h) VALUES('1','" . $_POST['login'] . "', '$password_hash1' )");
    $sql1 = mysqli_query($conn, "SELECT user_id FROM user WHERE email = '" . $_POST['login'] . "'");

    while ($row = mysqli_fetch_array($sql1)) {
        $result = trim($row['user_id']);
    }
    $auth = "0";
    $sql2 = mysqli_query($conn, "Insert into device(device_user_id, device_mac, auth) VALUES ('" . $result . "','" . $mac . "','" . $auth . "')");
    $sql3 = mysqli_query($conn, "Insert into customer(address, city, customer_user_id, first_name, last_name, zipcode) VALUES ('" . $_POST['Address'] . "', '" . $_POST['City'] . "','" . $result . "' ,'" . $_POST['Fname'] . "' , '" . $_POST['Lname'] . "', '" . $_POST['Cpostal'] . "')");
}
?>
<html>
<<<<<<< HEAD
    <head>
        <title> Registo de Utilizadores 1</title>
    </head>
    <body>
        <form method="POST" action="">
            <label>Primeiro Nome:</label><input type="text" name="Fname" id="Fname" required><br>
            <label>Ultimo Nome:</label><input type="text" name="Lname" id="Lname" required><br>
            <label>Morada:</label><input type="text" name="Address" id="Address" required><br>
            <label>Cidade:</label><input type="text" name="City" id="City" required><br>
            <label>Código Postal:</label><input type="text" name="Cpostal" id="Cpostal" required><br>
            <label>Mac Address:</label><input type="text" name="mac1" id="mac1" size="2" pattern=".{2,}" maxlength="2" required>
            <input type="text" name="mac2" id="mac2" size="2" pattern=".{2,}" maxlength="2" required>
            <input type="text" name="mac3" id="mac3" size="2" pattern=".{2,}" maxlength="2" required>
            <input type="text" name="mac4" id="mac4" size="2" pattern=".{2,}" maxlength="2" required>
            <input type="text" name="mac5" id="mac5" size="2" pattern=".{2,}" maxlength="2" required>
            <input type="text" name="mac6" id="mac6" size="2" pattern=".{2,}" maxlength="2" required><br>
            <label>Login:</label><input type="text" name="login" id="login" required><br>
            <label>Senha:</label><input type="password" name="pass" id="pass" required><br>
=======
<head>
<title> Registo de Utilizadores 1</title>
</head>
<body>
<form method="POST" action="">
    <label>Primeiro Nome:</label><input type="text" name="Fname" id="Fname" required><br>
<label>Ultimo Nome:</label><input type="text" name="Lname" id="Lname" required><br>
<label>Morada:</label><input type="text" name="Address" id="Address" required><br>
<label>Cidade:</label><input type="text" name="City" id="City" required><br>
<label>Código Postal:</label><input type="text" name="Cpostal" id="Cpostal" required><br>
<label>Mac Address:</label><input type="text" name="mac1" id="mac1" size="2" maxlength="2" required>
<input type="text" name="mac2" id="mac2" size="2" maxlength="2" required>
<input type="text" name="mac3" id="mac3" size="2" maxlength="2" required>
<input type="text" name="mac4" id="mac4" size="2" maxlength="2" required>
<input type="text" name="mac5" id="mac5" size="2" maxlength="2" required>
<input type="text" name="mac6" id="mac6" size="2" maxlength="2" required><br>
<label>Login:</label><input type="text" name="login" id="login" required><br>
<label>Senha:</label><input type="password" name="pass" id="pass" required><br>
>>>>>>> 7398ff6dd75840de97e86738ca592c6b7573e1e5

            <input type="submit" value="submit" id="submit" name="submit">

        </form>
    </body>
</html>