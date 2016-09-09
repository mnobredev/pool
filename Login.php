<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST["Login"]))
{
    include 'chave.php'; // chave de login
	$sql = mysqli_query($conn,"SELECT * FROM users WHERE Login = '$_POST[username]' 
		AND password = '$_POST[pass]'" );
	$row = mysqli_fetch_array($sql);
    
	if(!$row){
        $Message = urlencode("Dados inválidos");
		header("Location: login.php?Message=".$Message);

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
<label>Senha:</label><input type="password" name="senha" id="senha"><br>
<input type="submit" value="Login" id="Login" name="Login">
</form>
</body>
</html>
