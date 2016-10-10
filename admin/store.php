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
        <style>#scrollhide::-webkit-scrollbar {width: 0px !important;}</style>
        <title>Projecto Final ATEC</title>
    </head>
    <body>
        <?php
        include 'navbar.php';
        include '../tools/chave.php';
        include '../tools/newproductmodal.php';
        $sql = mysqli_query($conn, "SELECT * FROM category");
        $arCatName=array();
        $arCatID=array();
        $arCatParent=array();
        while ($row = mysqli_fetch_array($sql)) {
            array_push($arCatName, $row['name_category']);
            array_push($arCatID, $row['id_category']);
            array_push($arCatParent, $row['parent_category']);
        }
        ?>
        
        <div class="row" style="padding: 70px 15px;">
            <?php
            include 'sidebar.php';
            include '../tools/catmodal.php';
            ?>
            <script>
            $( "#store" ).toggleClass( "active" );
            </script>
            
                <div class="col-md-10">
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Inserir produto</h3></div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome</label>
                                    <input name="nameProduct" class="form-control" type="text" required>                             
                                </div>
                                <div class="form-group">
                                    <label>Preço</label>
                                    <input name="priceProduct" class="form-control" pattern="[0-9\.].{3,8}" type="text" required>                             
                                </div>
                                <div class="form-group">
                                    <label>Categoria </label> <a href="#" data-toggle="modal" data-target="#addCat" title="Adicionar nova categoria"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                                    <select class="form-control" id="category" onchange="getSub()">
                                        <option>Escolha uma opção</option>
                                        <?php
                                        for ($i=0; $i<count($arCatID); $i++) {
                                            if ($arCatParent[$i]==0){
                                                echo "<option value='".$arCatID[$i]."'>".$arCatName[$i]."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Subcategoria</label>
                                    <select name="subcatProduct" id="subcat" class="form-control" required>
                                        <script>
                                            function getSub(){
                                                var cat = document.getElementById("category");
                                                var chosenCat = cat.options[cat.selectedIndex].value;
                                                var catName =<?php echo json_encode($arCatName); ?>;
                                                var catID =<?php echo json_encode($arCatID); ?>;
                                                var catParent =<?php echo json_encode($arCatParent); ?>;
                                                var x = document.getElementById("subcat");
                                                x.options.length = 0;
                                                for (var i=0; i<catID.length; i++) {
                                                    var option = document.createElement("option");
                                                    if (catParent[i]===chosenCat){
                                                        option.text = catName[i];
                                                        option.value = catID[i];
                                                        x.add(option);
                                                    }
                                                }
                                            }
                                        </script>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group  col-md-8">
                                <label>Descrição</label>
                                <textarea name="descProduct" class="form-control" rows="6" type="text" required></textarea>
                            </div>
                            <div class="form-group col-md-8">
                                <label>Imagens</label>

                                    <div class="row">
                                        <div class='col-md-4'>
                                            <div class="thumbnail">
                                                <img id='addImg1' style='width: 15vw; height: 15vw;' src="../img/add.png">
                                                <div class="caption">
                                                    <label class="btn btn-default btn-file" style="width: 100%">
                                                    Adicionar imagem<input type='file' style="display: none;" id="imgInp1" name="imgInp1" />
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class="thumbnail">
                                                <img id='addImg2' style='width: 15vw; height: 15vw;' src="../img/add.png">
                                                <div class="caption">
                                                <label class="btn btn-default btn-file" style="width: 100%">
                                                    Adicionar imagem<input type='file' style="display: none;" id="imgInp2" name="imgInp2" />
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-4'>
                                            <div class="thumbnail">
                                                <img id='addImg3' style='width: 15vw; height: 15vw;'  src="../img/add.png">
                                                <div class="caption">
                                                <label class="btn btn-default btn-file" style="width: 100%">
                                                    Adicionar imagem<input type='file' style="display: none;" id="imgInp3" name="imgInp3" />
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <script>
                                    function readURL1(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#addImg1').attr('src', e.target.result);
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    $("#imgInp1").change(function(){
                                        readURL1(this);
                                    });

                                    function readURL2(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#addImg2').attr('src', e.target.result);
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    $("#imgInp2").change(function(){
                                        readURL2(this);
                                    });

                                    function readURL3(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#addImg3').attr('src', e.target.result);
                                            }

                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }

                                    $("#imgInp3").change(function(){
                                        readURL3(this);
                                    });

                                </script>
                            </div>
                        </div>
                        <div class="panel-footer"><button type="submit" id="newProduct" name="newProduct" value="newProduct" class="btn btn-primary" >Inserir</button></div>
                    </div>
                    </form>
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><h3 class="panel-title">Editar equipamento</h3></div>
                        <div class="panel-body">
                            <?php
                            if(isset($_GET["id"])){
                                $id = $_GET["id"];
                                include '../tools/editproduct.php';
                            }
                            else{
                                include '../tools/searchproduct.php';
                            }
                            ?>
                        </div>
                        <div class="panel-footer"><button type="button" class="btn btn-primary" >Editar</button></div>
                    </div>
                    </form>
                </div>
            
        </div>
        
        <?php
        if(isset($_POST["submitCat"])){
            $sql = mysqli_query($conn,"INSERT INTO category (name_category, parent_category) VALUES ('".$_POST[newCat]."', '".$_POST[parentCat]."')");
        }
        
        if(isset($_POST["newProduct"])){
            $sql = mysqli_query($conn,"INSERT INTO product (name_product, price_product, description_product, category_product) VALUES ('".$_POST[nameProduct]."', '".$_POST[priceProduct]."', '".$_POST[descProduct]."', '".$_POST[subcatProduct]."')");
            $sql1 = mysqli_query($conn,"SELECT id_product FROM product ORDER BY id_product DESC LIMIT 1;");
            include "../tools/addimg.php";
            echo "<script type='text/javascript'>$('#confirmationModal').modal();</script>";
        }
        
        if (isset($_POST["searchProduct"])){
            $sql = mysqli_query($conn,"SELECT * FROM product where name_product like '%".$_POST[tobeSearched]."%';");
            while ($row = mysqli_fetch_array($sql)){
                $displayme = $row['name_product'];
                $displayID = $row['id_product'];
                echo "<script>$('#scrollhide').append('<a href=\'?id=$displayID\' class=\'list-group-item\'>$displayme</a>');</script>";
            }
        }
        
        ?>
    </body>
</html>
