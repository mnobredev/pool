<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Projecto Final ATEC</title>
    </head>
    <body style="position: relative;">    
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
            $sql = mysqli_query($conn,"SELECT password FROM user WHERE email = '$_POST[user]'" );

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
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item" >
                    <div class="first-slide" style="min-height: 400px; background-color: #337ab7;"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Já tem o seu equipamento?</h1>
                            <p>Registe já o seu Arduino e tire partido do sistema de controlo de valores de água mais avançado do mercado.</p>
                            <p><a class="btn btn-lg btn-default" href="#" role="button">Registe-se já</a></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="second-slide" style="min-height: 400px; background-color: #337ab7;"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Conheça a equipa</h1>
                            <p>Conheça os alunos que desenvolveram este sistema com o objectivo de revolucionar o mercado dos Arduinos.</p>
                            <p><a class="btn btn-lg btn-default" href="#whois" role="button">Ver mais</a></p>
                        </div>
                    </div>
                </div>
                <div class="item active">
                    <div class="third-slide" style="min-height: 400px; background-color: #337ab7;"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Fiabilidade e design</h1>
                            <p>O nosso equipamento foi construído para durar e com um design irresistível.</p>
                            <p><a class="btn btn-lg btn-default" href="#" role="button">Veja a galeria</a></p>
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
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Design irresistível <span class="text-muted">Integra-se em qualquer ambiente</span></h2>
                    <p class="lead">Com um design inspirado em linhas modernas e com acabamentos de luxo o Arduino ocupa muito pouco espaço na sua divisão e dá medições de qualidade de água precisas. A sua interface foi feita a pensar no utilizador comum e permite dar estatísticas que ajudem a prolongar o tempo de vida da sua piscina e a qualidade da água em que mergulha, para uma experiência diferenciadora escolha Arduino.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="img/arduino1.png" data-holder-rendered="true">
                </div>
            </div>
            
            <hr class="featurette-divider">
            
            <div class="row featurette">
                <div class="col-md-5">
                    <div id="carousel-example-generic" class="carousel slide featurette-image img-responsive center-block" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="img/pool1.jpg" alt="img1" style="min-width: 100%;">
                                <div class="carousel-caption">
                                PEW PEW PEW
                                </div>
                            </div>
                            <div class="item">
                                <img src="img/pool1.jpg" alt="img1" style="min-width: 100%;">
                                <div class="carousel-caption">
                                PEW PEW PEW
                                </div>
                            </div>
                            <div class="item">
                                <img src="img/pool1.jpg" alt="img1" style="min-width: 100%;">
                                <div class="carousel-caption">
                                PEW PEW PEW
                                </div>
                            </div>
                          </div>

                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                   <!-- <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzUwMHg1MDAvYXV0bwpDcmVhdGVkIHdpdGggSG9sZGVyLmpzIDIuNi4wLgpMZWFybiBtb3JlIGF0IGh0dHA6Ly9ob2xkZXJqcy5jb20KKGMpIDIwMTItMjAxNSBJdmFuIE1hbG9waW5za3kgLSBodHRwOi8vaW1za3kuY28KLS0+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsjaG9sZGVyXzE1NzZkMDkyMDViIHRleHQgeyBmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjVwdCB9IF1dPjwvc3R5bGU+PC9kZWZzPjxnIGlkPSJob2xkZXJfMTU3NmQwOTIwNWIiPjxyZWN0IHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjRUVFRUVFIi8+PGc+PHRleHQgeD0iMTg1LjEyNSIgeT0iMjYxLjEiPjUwMHg1MDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
               --> </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
            </div>
            
            <hr class="featurette-divider">
            
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
                    <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzUwMHg1MDAvYXV0bwpDcmVhdGVkIHdpdGggSG9sZGVyLmpzIDIuNi4wLgpMZWFybiBtb3JlIGF0IGh0dHA6Ly9ob2xkZXJqcy5jb20KKGMpIDIwMTItMjAxNSBJdmFuIE1hbG9waW5za3kgLSBodHRwOi8vaW1za3kuY28KLS0+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsjaG9sZGVyXzE1NzZkMDkyMDViIHRleHQgeyBmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjVwdCB9IF1dPjwvc3R5bGU+PC9kZWZzPjxnIGlkPSJob2xkZXJfMTU3NmQwOTIwNWIiPjxyZWN0IHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjRUVFRUVFIi8+PGc+PHRleHQgeD0iMTg1LjEyNSIgeT0iMjYxLjEiPjUwMHg1MDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
                </div>
            </div>
            
            <hr class="featurette-divider">
            
            <div class="row" id="whois">
                <div class="col-lg-4">
                    <img class="img-circle" src="img/mnobre.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>Mário Nobre</h2>
                    <p>Inserir texto genérico aqui!</p>
                </div>
                <div class="col-lg-4">
                    <img class="img-circle" src="img/asilva.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>António Silva</h2>
                    <p>Inserir texto genérico aqui!</p>
                </div>
                <div class="col-lg-4">
                    <img class="img-circle" src="img/fakeiurie.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>Iurie Caradja</h2>
                    <p>Inserir texto genérico aqui!</p>
                </div>
            </div>
            
            <hr class="featurette-divider">
            
        </div>
        <footer>
            <p>© 2016 ATEC - Academia de Formação</p>
        </footer>  
    </body>
</html>
