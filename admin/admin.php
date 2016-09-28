<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Acesso Administrador</title>
    </head>
    <body>        
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">ATEC - Projecto Final</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" method="POST" action="">
                        <div class="form-group">
                            <input name="user" type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input name="pass" type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" name="login" class="btn btn-success">Iniciar sessão</button>
                    </form>
                </div>
            </div>
        </nav>
        
        <div class="container" style="padding: 40px 15px;text-align: center;">
            <h1 style="color: #cc0000;">ACESSO ADMINISTRATIVO</h1>
            <p class="lead">Apenas pessoal autorizado.</p>
        </div>
        <?php
        ob_start();
        include '../tools/modalwrongpassword.php';
        if(isset($_POST["login"])){
            
            include '../tools/chave.php';
            $sql = mysqli_query($conn,"SELECT password, user_id, user_type FROM user WHERE email = '$_POST[user]'" );

            while($row = mysqli_fetch_array($sql))
            {
                $result = trim($row['password']);
                $auth = $row['user_type'];
            }

            if(password_verify($_POST['pass'], trim($result)) && $auth=="2"){
                header("Location: equip.php");
            }
            else{
                echo "<script type='text/javascript'>$('#wrongPassword').modal();</script>";
            }
        }

        ?>
    </div>
    </body>
</html>
