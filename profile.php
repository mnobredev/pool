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
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <title>Aqua Quality Systems</title>
    </head>
    <body>
        <?php
            include 'tools/chave.php';
            include 'tools/checksession.php';    
            include 'tools/header.php';
            $toEdit=$_GET["change"];
            $sql = mysqli_query($conn, "SELECT email, address, city, customer_id, first_name, last_name, tel, zipcode, device_mac, password FROM `user` left join customer on customer_user_id=user_id left join device on device_user_id=user_id WHERE user_id=$id");
            while ($row = mysqli_fetch_array($sql)) {
                $firstName = $row['first_name'];
                $lastName = $row['last_name'];
                $address = $row['address'];
                $zip = $row['zipcode'];
                $city = $row['city'];
                $tel = $row['tel'];
                $mac = $row['device_mac'];
                $password = "Introduza a nova password";
            }
            if ($toEdit!=NULL){
                switch ($toEdit):
                    case "0":
                        $onRecord = $firstName;
                        $dbName = 'first_name';
                        $dbTable = 'customer';
                        $fieldName = 'Primeiro Nome';
                        $inputType = 'text';
                        $idtochange = 'customer_user_id';
                        break;
                    case "1":
                        $onRecord = $lastName;
                        $dbName = 'last_name';
                        $dbTable = 'customer';
                        $fieldName = 'Apelido';
                        $inputType = 'text';
                        $idtochange = 'customer_user_id';
                        break;
                    case "2":
                        $onRecord = $address;
                        $dbName = 'address';
                        $dbTable = 'customer';
                        $fieldName = 'Morada';
                        $inputType = 'text';
                        $idtochange = 'customer_user_id';
                        break;
                    case "3":
                        $onRecord = $zip;
                        $dbName = 'zipcode';
                        $dbTable = 'customer';
                        $fieldName = 'Código Postal';
                        $inputType = 'text';
                        $idtochange = 'customer_user_id';
                        break;
                    case "4":
                        $onRecord = $city;
                        $dbName = 'city';
                        $dbTable = 'customer';
                        $fieldName = 'Cidade';
                        $inputType = 'text';
                        $idtochange = 'customer_user_id';
                        break;
                    case "5":
                        $onRecord = $tel;
                        $dbName = 'tel';
                        $dbTable = 'customer';
                        $fieldName = 'Telefone';
                        $inputType = 'text';
                        $idtochange = 'customer_user_id';
                        break;
                    case "6":
                        $onRecord = $password;
                        $dbName = 'password';
                        $dbTable = 'user';
                        $fieldName = 'Password';
                        $inputType = 'text';
                        $idtochange = 'user_id';
                        break;
                    default:
                        break;
                endswitch;
                include 'tools/eprofilemodal.php';
                include 'tools/success.php';
                if (isset($_POST["submitEdit"])) {
                    if ($toEdit=="6"){
                        include "handler/password.php?id=$id&password=".$_POST["newData"];
                    }
                    else{
                        $write = mysqli_query($conn, "UPDATE ".$dbTable." SET ".$dbName."='".$_POST["newData"]."' WHERE ".$idtochange."=$id");
                    }
                    echo "<script type='text/javascript'>$('#success').modal();</script>";
                }
                else{
                    echo "<script type='text/javascript'>$('#editProfile').modal();</script>";
                }
            }
        ?>
        <div class="container" style="margin-top: 5%;">          
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Perfil
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <img src="img/drop.png" alt="company-icon" class="img-thumbnail">
                        </div> 
                        <div class="col-md-8">
                            <?php echo "<p><strong>Nome: </strong>".$firstName." <a href='profile.php?change=0' title= 'Alterar nome'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></p>";
                            echo "<p><strong>Apelido: </strong>".$lastName." <a href='profile.php?change=1' title= 'Alterar apelido'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></p>";
                            echo "<p><strong>Morada: </strong>".$address." <a href='profile.php?change=2' title= 'Alterar morada'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></p>";
                            echo "<p><strong>Código Postal: </strong>".$zip." <a href='profile.php?change=3' title= 'Alterar CP'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></p>";
                            echo "<p><strong>Cidade: </strong>".$city." <a href='profile.php?change=4' title= 'Alterar cidade'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></p>";
                            echo "<p><strong>Telefone: </strong>".$tel." <a href='profile.php?change=5' title= 'Alterar telefone'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></p>";
                            echo "<p><strong>Password: </strong>Alterar password <a href='profile.php?change=6' title= 'Alterar telefone'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></p>";
                            echo "<p><strong>Equipamento: </strong>".$mac."</p>"; ?>                 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Histórico de compras
                    </div>
                    <div class="panel-body">
                        COISAS BOAS DE COMPRAS ENTRAM AQUI!
                    </div>
                </div>
            </div>
        </div>
        <?php
            include 'tools/footer.php';
        ?>
    </body>
</html>