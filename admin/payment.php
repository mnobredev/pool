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
        <link rel="icon" href="../favicon.ico" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Aqua Quality Systems</title>
    </head>
    <body>
        <?php
        include '../tools/chave.php';
        include 'navbar.php';
        if (isset($_GET[editPayment])){
            $sql = mysqli_query($conn,"UPDATE sales SET Pay_status='$_GET[taskOption]' where Id_sale=$_GET[editPayment];");
        }
        ?>
        
        <div class="row" style="padding: 70px 15px;">
            <?php
                include 'sidebar.php';
            ?>
            <script>
                $( "#paym" ).toggleClass( "active" );
            </script>
            <div class="col-md-10">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Pagamentos</h3></div>
                    <div class="panel-body">
                        <?php
                                if(isset($_GET["id"])){
                                    $id = $_GET["id"];
                                    include '../tools/editpayment.php';
                                }
                                else{
                                    include '../tools/searchpayment.php';
                                }
                            ?>
                    </div>
                    <div class="panel-footer"><button type="submit" id="editPayment" name="editPayment" value="<?php echo $id; ?>" class="btn btn-primary" >Editar</button></div>
                </div> 
            </div>
        </div>
    </body>
</html>
