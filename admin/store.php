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
        <title>Projecto Final ATEC</title>
    </head>
    <body>
        <?php
        include 'navbar.php';
        ?>
        
        <div class="row" style="padding: 70px 15px;">
            <?php
            include 'sidebar.php';
            ?>
            <script>
            $( "#store" ).toggleClass( "active" );
            </script>
            <div class="col-md-10">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Inserir equipamento</h3></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Indique o MAC Address do equipamento</label>
                            <div class="row">
                                <div class="col-xs-2">
                                    <input class="form-control" type="text" class="col-md-1" name="newmac1" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                </div>
                                <div class="col-xs-2">
                                    <input class="form-control" type="text" class="col-md-1" name="newmac2" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                </div>
                                <div class="col-xs-2">
                                    <input class="form-control" type="text" class="col-md-1" name="newmac3" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                </div>
                                <div class="col-xs-2">
                                    <input class="form-control" type="text" class="col-md-1" name="newmac4" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                </div>
                                <div class="col-xs-2">
                                    <input class="form-control" type="text" class="col-md-1" name="newmac5" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                </div>
                                <div class="col-xs-2">
                                    <input class="form-control" type="text" class="col-md-1" name="newmac6" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quais os modulos activos deste equipamento?</label>
                            <div class="checkbox"><label><input type="checkbox"> PH</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Cloro</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Temperatura</label></div>
                            <div class="checkbox"><label><input type="checkbox"> Profundidade</label></div>
                        </div>
                    </div>
                    <div class="panel-footer"><button type="button" class="btn btn-primary" >Inserir</button></div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Editar equipamento</h3></div>
                    <div class="panel-body">
                        <div class="col-md-6">
                            <div class="list-group">
                                <label>Ultimos 5 equipamentos inseridos</label>
                                <a href="#" class="list-group-item">00:00:00:00:00</a>
                                <a href="#" class="list-group-item">00:00:00:00:01</a>
                                <a href="#" class="list-group-item">00:00:00:00:02</a>
                                <a href="#" class="list-group-item">00:00:00:00:03</a>
                                <a href="#" class="list-group-item">00:00:00:00:04</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label>Quero pesquisar por um MAC Address  <small>Insira o MAC separado por ":" (sem aspas).</small></label>
                                <div class="col-md-10">
                                <input class="form-control" type="text">
                                </div>
                                <div class="col-md-2">
                                <button type="button" class="btn btn-success" style="margin-top: 1%;">Pesquisar</button>
                                </div>
                            </div>
                                <div id="scrollhide" class="list-group" style="margin-top: 1%; max-height: 160px; overflow-y: scroll;">
                                    <a href="#" class="list-group-item">00:00:00:00:00</a>
                                    <a href="#" class="list-group-item">00:00:00:00:01</a>
                                    <a href="#" class="list-group-item">00:00:00:00:02</a>
                                    <a href="#" class="list-group-item">00:00:00:00:02</a>
                                    <a href="#" class="list-group-item">00:00:00:00:02</a>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Indique o MAC Address do equipamento</label>
                                <div class="row">
                                    <div class="col-xs-2">
                                        <input class="form-control" type="text" class="col-md-1" name="newmac1" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" type="text" class="col-md-1" name="newmac2" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" type="text" class="col-md-1" name="newmac3" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" type="text" class="col-md-1" name="newmac4" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" type="text" class="col-md-1" name="newmac5" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                    </div>
                                    <div class="col-xs-2">
                                        <input class="form-control" type="text" class="col-md-1" name="newmac6" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Quais os modulos activos deste equipamento?</label>
                                <div class="checkbox"><label><input type="checkbox"> PH</label></div>
                                <div class="checkbox"><label><input type="checkbox"> Cloro</label></div>
                                <div class="checkbox"><label><input type="checkbox"> Temperatura</label></div>
                                <div class="checkbox"><label><input type="checkbox"> Profundidade</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer"><button type="button" class="btn btn-primary" >Editar</button></div>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
