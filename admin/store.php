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
        include '../tools/chave.php';
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
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Inserir produto</h3></div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control" type="text" required>                             
                            </div>
                            <div class="form-group">
                                <label>Preço</label>
                                <input class="form-control" type="text" required>                             
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
                                <select id="subcat" class="form-control">
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
                            <textarea class="form-control" rows="6" type="text" required></textarea>
                            <form id="form1" runat="server">
                                <label class="btn btn-default btn-file">
                                    Adicionar imagem<input type='file' style="display: none;" id="imgInp" />
                                </label>
                                <img id="blah" src="#" alt="your image" style="" />
                            </form>
                            <script>
                            function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
                            </script>
                        </div>
                    </div>
                    <div class="panel-footer"><button type="button" class="btn btn-primary" >Inserir</button></div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3 class="panel-title">Editar equipamento</h3></div>
                    <div class="panel-body">
                        I AM THE WATCHER ON THE WALL - PLZ MAKE ME DECENT CONTENT
                    </div>
                    <div class="panel-footer"><button type="button" class="btn btn-primary" >Editar</button></div>
                </div>
            </div>
        </div>
        <?php
        if(isset($_POST["submitCat"])){
            
            $sql = mysqli_query($conn,"INSERT INTO category (name_category, parent_category) VALUES ('".$_POST[newCat]."', '".$_POST[parentCat]."')");
            echo "fils de pute ".$_POST[parentCat]." pascua ".$_POST[newCat];
        }

        ?>
    </body>
</html>
