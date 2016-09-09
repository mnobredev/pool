<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST["Login"]))
{
    include 'chave.php'; // chave de login
    
    
    	
$usrcrp =md5($_POST[login]).md5($_POST[pass]);
$usrcrp1 = md5($usrcrp);
    
	$sql = mysqli_query($conn,"SELECT * FROM user WHERE email = '$_POST[login]' 
		AND password = '$_POST[pass]' AND hash = '$usrcrp1'" );
        echo $sql;
	$row = mysqli_fetch_array($sql);
    
	if(!$row){
        $Message = urlencode("Dados inválidos");
		header("Location: login.php?Message=".$row);
	}else{
		session_start();
		$_SESSION["id"] = $row["ID_user"];
		header("Location: main.php");
	}
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