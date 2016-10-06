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
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Projecto Final ATEC</title>
    </head>
    <body>
        <?php
            include 'tools/header.php';
            //include 'tools/checksession.php';
        ?>
        <!--I AM SOON TO BE A GLORIOUS STORE! HAIL HYDRA!!!!!-->
        
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
                            <p><a class="btn btn-lg btn-default" href="#" role="button">Ver mais</a></p>
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
        
        <div class="container" style="margin-top: 2%;">
        <div class="row">
            <div class="col-sm-6 col-md-3  text-left">
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
					<li class="row">
						<span class="quantity">1</span>
						<span class="itemName">Birthday Cake</span>
						<span class="popbtn" data-original-title="" title=""><a class="arrow"></a></span>
						<span class="price">$49.95</span>
					</li>
					<li class="row">
						<span class="quantity">50</span>
						<span class="itemName">Party Cups</span>
						<span class="popbtn" data-original-title="" title=""><a class="arrow"></a></span>
						<span class="price">$5.00</span>
					</li>
					<li class="row">
						<span class="quantity">20</span>
						<span class="itemName">Beer kegs</span>
						<span class="popbtn" data-original-title="" title=""><a class="arrow"></a></span>
						<span class="price">$919.99</span>				
					</li>
					<li class="row">
						<span class="quantity">18</span>
						<span class="itemName">Pound of beef</span>
						<span class="popbtn" data-original-title="" title=""><a class="arrow"></a></span>
						<span class="price">$269.45</span>
					</li>
					<li class="row">
						<span class="quantity">1</span>
						<span class="itemName">Bullet-proof vest</span>
						<span class="popbtn" data-parent="#asd" data-toggle="collapse" data-target="#demo" data-original-title="" title=""><a class="arrow"></a></span>
						<span class="price">$450.00</span>				
					</li>
					<li class="row totals">
						<span class="itemName">Total:</span>
						<span class="price">$1694.43</span>
						<span class="order"> <a class="text-center">ORDER</a></span>
					</li>
				</ul>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/store/arduino.png" alt="Arduino" width="242px" height="200px">
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>ZE BEST</p>
                        <p><a href="#" class="btn btn-primary" role="button">BUY ME NOW!</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/store/arduino.png" alt="Arduino" width="242px" height="200px">
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>ZE BEST</p>
                        <p><a href="#" class="btn btn-primary" role="button">BUY ME NOW!</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="img/store/arduino.png" alt="Arduino" width="242px" height="200px">
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>ZE BEST</p>
                        <p><a href="#" class="btn btn-primary" role="button">BUY ME NOW!</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
            include 'tools/footer.php';
        ?>
    </body>
</html>
