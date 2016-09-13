<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST["Login"]))

	
{
    include 'chave.php'; // chave de login




$sql = mysqli_query($conn,"SELECT h FROM user WHERE email = '$_POST[login]'" ); //vai ver a hash já criada
        
	while($row = mysqli_fetch_array($sql))
	{
		$result = trim($row['h']);
	}

echo $result;
echo $_POST['pass']."\n";

if(password_verify($_POST['pass'], trim($result))){
             echo "CONNECT \n";
	}else{

	}

 
	/*$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$password_hash1=password_hash($_POST['pass'], PASSWORD_BCRYPT, $options);
	$sql = mysqli_query($conn,"Insert into user(user_type, email, h) VALUES('1','antnunessilva@gmail.com', '$password_hash1' )" );*/

   }

?>
<html>
<head>
<title> Login</title>
</head>
<body>
<form method="POST" action="">
<label>Login:</label><input type="text" name="login" id="login"><br>
<label>Senha:</label><input type="password" name="pass" id="pass"><br>
<input type="submit" value="Login" id="Login" name="Login">

</form>
</body>
</html>