<?php

if(isset($_POST["Login"])){
    
    include 'chave.php';
    $sql = mysqli_query($conn,"SELECT password FROM user WHERE email = '$_POST[login]'" ); //vai ver a hash já criada
        
    while($row = mysqli_fetch_array($sql))
    {
        $result = trim($row['password']);
    }

    if(password_verify($_POST['pass'], trim($result))){
        echo 'passou';
    }
    else{
        echo 'passou';
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