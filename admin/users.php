<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <title>Aqua Quality Systems</title>
    </head>
    <body>
        <?php
        ob_start();
        include 'navbar.php';
        ?>
        
        <div class="row" style="padding: 70px 15px;">
            <?php
            include '../tools/chave.php';
            include 'sidebar.php';
            ?>
            <script>
            $( "#users" ).toggleClass( "active" );
            </script>
            
            <div class="col-md-10">
                    <form method="POST" action="">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Inserir administrador</h3></div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="nameProduct" class="form-control" type="text" required>                             
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="nameProduct" class="form-control" type="password" required>                             
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <label>Informação importante</label>
                                        <p>Bacon ipsum dolor amet beef ribs sausage turducken fatback bacon pork belly cupim beef frankfurter landjaeger swine kevin pork chop short loin chuck. Strip steak beef ribs tri-tip, jerky short ribs biltong pancetta flank venison. Kielbasa pig kevin burgdoggen. Short loin cupim pastrami strip steak tail leberkas hamburger capicola filet mignon fatback. Porchetta rump hamburger pancetta cupim t-bone drumstick. Kevin shankle biltong ribeye.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer"><button type="submit" id="newProduct" name="newProduct" value="newProduct" class="btn btn-primary" >Inserir</button></div>
                    </div>
                    </form>
                    <form method="POST" action="">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Editar administrador</h3></div>
                        <div class="panel-body">
                            <?php
                                if(isset($_GET["idadm"])){
                                    $id = $_GET["idadm"];
                                    include '../tools/editadmin.php';
                                }
                                else{
                                    include '../tools/searchadmin.php';
                                }
                            ?>
                        </div>
                        <div class="panel-footer"><button type="submit" id="editAdmin" name="editAdmin" value="editAdmin" class="btn btn-primary" >Editar</button></div>
                    </div>
                    </form>
                    <form method="POST" action="">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Editar utilizador</h3></div>
                        <div class="panel-body">
                            <?php
                                if(isset($_GET["id"])){
                                    $id = $_GET["id"];
                                    include '../tools/edituser.php';
                                }
                                else{
                                    include '../tools/searchuser.php';
                                }
                            ?>
                        </div>
                        <div class="panel-footer"><button type="submit" id="editUser" name="editUser" value="editUser" class="btn btn-primary" >Editar</button></div>
                    </div>
                    </form>
            
        </div>
    </body>
</html>
