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
        <title>Projecto Final ATEC</title>
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
                      <button type="button" class="btn btn-primary btn-link" data-toggle="modal" data-target="#newAccount">Novo utilizador</button>
                  </form>
                </div><!--/.navbar-collapse -->
              </div>
        </nav>
    
        <?php
        include 'tools/modalwrongpassword.php';
        include 'tools/newaccount.php';
        if(isset($_POST["login"])){
            
            include 'tools/chave.php';
            $sql = mysqli_query($conn,"SELECT password FROM user WHERE email = '$_POST[user]'" ); //vai ver a hash já criada

            while($row = mysqli_fetch_array($sql))
            {
                $result = trim($row['password']);
            }

            if(password_verify($_POST['pass'], trim($result))){
                header("Location: main.php");
            }
            else{
                echo "<script type='text/javascript'>$('#wrongPassword').modal();</script>";
            }
        }

        ?>
    
    <div class="jumbotron">
      <div class="container">
        <h1>Controlo de valores</h1>
      </div>
    </div>
    <div class="container">

      <footer>
        <p>© 2016 ATEC - Academia de Formação</p>
      </footer>
    </div>
    </body>
</html>
