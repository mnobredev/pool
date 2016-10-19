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
        <link rel="stylesheet" href="css/caroussel.css">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <title>Aqua Quality Systems</title>
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
                    <a class="navbar-brand" href="#">Aqua Quality Systems</a>
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
            $sql = mysqli_query($conn,"SELECT * FROM user WHERE email = '$_POST[user]'" );

            while($row = mysqli_fetch_array($sql))
            {
                $result = trim($row['password']);
                $id = $row['user_id'];
                $name = $row['email'];
            }

            if(password_verify($_POST['pass'], trim($result))){
                session_start();
                $_SESSION["id"] = $id;
                $sql = mysqli_query($conn,"SELECT * FROM customer WHERE customer_user_id=$id");
                while($row = mysqli_fetch_array($sql))
                {
                    $name = $row['first_name']." ".$row['last_name'];
                }
                $_SESSION["name"] = $name;
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
                    <div class="first-slide"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Já tem o seu equipamento?</h1>
                            <p>Registe já o seu Aqua e tire partido do sistema de controlo de valores de água mais avançado do mercado.</p>
                            <p><a class="btn btn-lg btn-default" href="#" role="button" data-toggle="modal" data-target="#newAccount">Registe-se já</a></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="second-slide"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Conheça a equipa</h1>
                            <p>Conheça os alunos que desenvolveram este sistema com o objectivo de revolucionar o mercado dos Arduinos.</p>
                            <p><a class="btn btn-lg btn-default" href="#whois" role="button">Ver mais</a></p>
                        </div>
                    </div>
                </div>
                <div class="item active">
                    <div class="third-slide"></div>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Fiabilidade e design</h1>
                            <p>O nosso equipamento foi construído para durar e com um design irresistível.</p>
                            <p><a class="btn btn-lg btn-default" href="#design" role="button">Veja a galeria</a></p>
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
        
       
        <div id="design" class="container marketing"> 
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Design irresistível <span class="text-muted">Integra-se em qualquer ambiente</span></h2>
                    <p class="lead">Com um design inspirado em linhas modernas e com acabamentos de luxo o seu Aqua ocupa muito pouco espaço na sua divisão e dá medições de qualidade de água precisas. A sua interface foi feita a pensar no utilizador comum e permite dar estatísticas que ajudem a prolongar o tempo de vida da sua piscina e a qualidade da água em que mergulha, para uma experiência diferenciadora escolha Aqua.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="img/arduino1.png" data-holder-rendered="true">
                </div>
            </div>
            
            <hr class="featurette-divider">
            
            <div class="row featurette">
                <div class="col-md-5">
                    <div id="carousel-example-generic" style=" height: 500px;" class="carousel slide featurette-image img-responsive center-block" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" style=" height: 500px;"  role="listbox">
                            <div class="item active" style="background-color: transparent; height: 500px;">
                                <img src="img/graphs1.png" alt="img1" style="min-width: 100%; height: 500px;">
                                <div class="carousel-caption" style="background-color: rgba(1,1,1,0.4); border-radius: 25px;">
                                    Medições detalhadas e de leitura fácil
                                </div>
                            </div>
                            <div class="item" style="background-color: transparent; height: 500px;">
                                <img src="img/responsive.png" alt="img1" style="min-width: 100%; height: 500px;">
                                <div class="carousel-caption" style="background-color: rgba(1,1,1,0.4); border-radius: 25px;">
                                    A nossa interface adapta-se a qualquer dispositivo.
                                </div>
                            </div>
                            <div class="item" style="background-color: transparent; height: 500px;">
                                <img src="img/phone1.png" alt="img1" style="min-width: 100%; height: 500px;">
                                <div class="carousel-caption" style="background-color: rgba(1,1,1,0.4); border-radius: 25px;">
                                    Receba alertas no seu dispositivo android com a nossa App.
                                </div>
                            </div>
                          </div>

                    <a class="left carousel-control" style="background-image: none" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" style="background-image: none" href="#carousel-example-generic" role="button" style="background-image: none" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
                </div>
                <div class="col-md-7">
                    <h2 class="featurette-heading">Experiencia de utilização avançada <span class="text-muted">Uma boa interface não é complicada</span></h2>
                    <p class="lead">Acreditamos que o utilizador deve ter uma experiência fantástica com as nossas aplicações em que a não seja necessário um manual para usufruir de todas as vantagens do nosso produto, simples mas avançado.</p>
                </div>
            </div>
            
            <hr class="featurette-divider">
            
            <div class="row" id="whois">
                <div class="col-lg-4">
                    <img class="img-circle" src="img/mnobre.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>Mário Nobre</h2>
                    <p>Apaixonado por problemas desafiantes, acredito que descobrir e entender o problema é o passo mais importante para o resolver. O Aqua nasceu de uma ideia universal a todos os projectos que idealizo, dotar todos os utilizadores de ferramentas avançadas mas de simples compreensão. De elevada qualidade mas de baixo custo, mais valor por menos dinheiro.</p>
                </div>
                <div class="col-lg-4">
                    <img class="img-circle" src="img/asilva.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>António Silva</h2>
                    <p>A programação é um elemento que faz parte do meu dia à dia. A curiosidade levou-me a aprender cada vez mais, e é um enorme prazer fazer parte de um processo de criação tão importante, como o desenvolvimento de software. O Aqua é uma aplicação online, fruto do espirito da nossa equipa, que satisfaz uma necessidade de mercado.</p>
                </div>
                <div class="col-lg-4">
                    <img class="img-circle" src="img/fakeiurie.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>Iurie Caradja</h2>
                    <p>Desde que me lembro, senti-me fascinado pelo desenvolvimento de software, considero que a programação é uma excelente forma de dar vida e materializar as minhas ideias e trabalhar neste projeto foi uma experiência bastante interessante considerando que é essencialmente uma integração de diferentes tipos de tecnologias e formas de desenvolvimento.</p>
                </div>
            </div>
            
            <hr class="featurette-divider">
            
        </div>
        <footer>
            <p>© 2016 ATEC - Academia de Formação</p>
        </footer>  
    </body>
</html>
