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
                </div>
              </div>
        </nav>
    
        <?php
        ob_start();
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
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item" >
            <div class="first-slide" style="min-height: 400px; background-color: #9d9d9d;"></div>
          <div class="container">
            <div class="carousel-caption">
              <h1>Já tem o seu equipamento?</h1>
              <p>Registe já o seu Arduino e tire partido do sistema de controlo de valores de água mais avançado do mercado.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Registe-se já</a></p>
            </div>
          </div>
        </div>
        <div class="item">
             <div class="second-slide" style="min-height: 400px; background-color: #9d9d9d;"></div>
          <div class="container">
            <div class="carousel-caption">
              <h1>Conheça a equipa</h1>
              <p>Conheça os alunos que desenvolveram este sistema com o objectivo de revolucionar o mercado dos Arduinos.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Ver mais</a></p>
            </div>
          </div>
        </div>
        <div class="item active">
           <div class="third-slide" style="min-height: 400px; background-color: #9d9d9d;"></div>
          <div class="container">
            <div class="carousel-caption">
              <h1>Fiabilidade e design</h1>
              <p>O nosso equipamento foi construído para durar e com um design irresistível.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Veja a galeria</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
        <div class="container marketing" style="margin-top: 5%; text-align: center;">
<div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div><!-- /.col-lg-4 -->
      </div>
        </div>
      <footer>
        <p>© 2016 ATEC - Academia de Formação</p>
      </footer>
    </div>
      
    </body>
</html>
