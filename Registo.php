<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST["submit"]))

	
{
    include 'chave.php'; // chave de login
$mac="";
for($i=1; $i<7; $i++)
{
    $mac.=$_POST['mac'.$i.''].":";
    if($i==6)
    {
        $mac.=$_POST['mac'.$i.''];
    }
}
$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$password_hash1=password_hash($_POST['pass'], PASSWORD_BCRYPT, $options);

$sql = mysqli_query($conn,"Insert into user(user_type, email, h) VALUES('1','".$_POST['login']."', '$password_hash1' )");
$sql1 = mysqli_query($conn,"SELECT user_id FROM user WHERE email = '".$_POST['login']."'" ); 
        
	while($row = mysqli_fetch_array($sql1))
	{
		$result = trim($row['user_id']);             
	}
    $auth = "0";    
$sql2 = mysqli_query($conn, "Insert into device(device_user_id, device_mac, auth) VALUES ('".$result."','".$mac."','".$auth."')");
$sql3 = mysqli_query($conn, "Insert into customer(address, city, customer_user_id, first_name, last_name, zipcode) VALUES ('".$_POST['Address']."', '".$_POST['City']."','".$result."' ,'".$_POST['Fname']."' , '".$_POST['Lname']."', '".$_POST['Cpostal']."')");
   }

?>
<html>
<head>
<title> Registo de Utilizadores 1</title>
</head>
<body>
<form method="POST" action="">
<label>Primeiro Nome:</label><input type="text" name="Fname" id="Fname"><br>
<label>Ultimo Nome:</label><input type="text" name="Lname" id="Lname"><br>
<label>Morada:</label><input type="text" name="Address" id="Address"><br>
<label>Cidade:</label><input type="text" name="City" id="City"><br>
<label>Código Postal:</label><input type="text" name="Cpostal" id="Cpostal"><br>
<label>Mac Address:</label><input type="text" name="mac1" id="mac1" size="2" maxlength="2">
<input type="text" name="mac2" id="mac2" size="2" maxlength="2">
<input type="text" name="mac3" id="mac3" size="2" maxlength="2">
<input type="text" name="mac4" id="mac4" size="2" maxlength="2">
<input type="text" name="mac5" id="mac5" size="2" maxlength="2">
<input type="text" name="mac6" id="mac6" size="2" maxlength="2"><br>
<label>Login:</label><input type="text" name="login" id="login"><br>
<label>Senha:</label><input type="password" name="pass" id="pass"><br>

<input type="submit" value="submit" id="submit" name="submit">

</form>
</body>
</html>