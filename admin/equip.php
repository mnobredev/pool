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
        <style>#scrollhide::-webkit-scrollbar {width: 0px !important;}</style>
    </head>
    <body>
        <?php
        include 'navbar.php';
        include '../tools/chave.php';
        if(isset($_POST["newEquip"])){
            $mac = "";
            for ($i = 1; $i < 7; $i++) {
                $mac.=$_POST['newmac' . $i . ''] . ":";
                if ($i == 6) {
                    $mac.=$_POST['newmac' . $i . ''];
                }
            }
            $sql = mysqli_query($conn,"INSERT INTO device (device_mac, device_user_id, auth) VALUES ('".$mac."', '0', '0')");
        }
        if(isset($_POST["editEquip"])){
            $mac = "";
            for ($i = 1; $i < 7; $i++) {
                $mac.=$_POST['editmac' . $i . ''] . ":";
                if ($i == 6) {
                    $mac.=$_POST['editmac' . $i . ''];
                }
            }
            $devid = $_GET["id"];
            mysqli_query($conn,"UPDATE device SET device_mac='".$mac."' where device_id=$devid");
        }
        ?>
        
        <div class="row" style="padding: 70px 15px;">
            <?php
            include 'sidebar.php';
            ?>
            <script>
            $( "#equips" ).toggleClass( "active" );
            </script>
            <div class="col-md-10">
                <form method="POST" action="">
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
                        <div class="panel-footer"><button type="submit" id="newEquip" name="newEquip" value="newEquip" class="btn btn-primary" >Inserir</button></div>
                    </div>
                </form>
                <form method="POST" action="">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Editar equipamento</h3></div>
                    <?php
                        if(isset($_GET["id"])){
                            $equipID = $_GET["id"];
                            include '../tools/editequip.php';
                        }
                        else{
                            include '../tools/searchequip.php';
                        }
                    ?>
                    <div class="panel-footer"><button type="submit" id="editEquip" name="editEquip" value="editEquip" class="btn btn-primary" >Editar</button></div>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>
