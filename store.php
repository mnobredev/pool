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
            include 'tools/chave.php';
            include 'tools/checksession.php';
            include 'tools/header.php';          
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
                <div id="myCart" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close">×</span>
                            <h2>Carrinho de compras</h2>
                            <p class="divider"> ID NOME PRECO</p>
                        </div>
                        <div class="modal-body">
                            <ul id="lista">
                            
                            </ul>
                            <script>
                               function resposta(str){
                                   var pa = document.getElementById("lista");
                                   var li = document.createElement("li");
                                   var id = document.createElement("ID");
                                   id.innerHTML=str[0];
                                   li.appendChild(id);
                                   var nome = document.createElement("Nome");
                                   nome.innerHTML=str[1];
                                   li.appendChild(nome);
                                   var preco = document.createElement("Preço");
                                   preco.innerHTML=str[2];
                                   li.appendChild(preco);
                                   li.className = id.innerHTML;
                                   console.log(li.classname);
                                   var remove = document.createElement("Remove");
                                   remove.innerHTML="<a href='javascript:removeelement("+li.className+")' id='myBtn' class='' role='button' ><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>";
                                   li.appendChild(remove);
                                   pa.appendChild(li);
                                }
                            </script>

                        </div>
                        <div class="modal-footer">
                            <h3><i>atec.marionobre.com</i></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">  
                    <?php
                        include 'tools/storenav.php';
                    ?>
                </div>
                <div class="col-md-10">
                    <?php
                        if (isset($_GET['cat'])){
                            $chosenCat=$_GET['cat'];
                            $getBreadcrums = mysqli_query($conn, "SELECT * from category where id_category=$chosenCat");
                            while ($row = mysqli_fetch_array($getBreadcrums)){
                                $catname = $row['name_category'];
                                $catid = $row['parent_category'];
                                $getParent = mysqli_query($conn, "SELECT * from category where id_category=$catid");
                                    while ($row = mysqli_fetch_array($getParent)){
                                        $pcatname = $row['name_category'];
                                        $pcatid = $row['id_category'];
                                    }
                                echo "<ol class='breadcrumb'>";
                                echo "<li><a href='store.php'>Loja</a></li>";
                                echo "<li><a href='store.php'>$pcatname</a></li>";
                                echo "<li class='active'><a href='store.php?cat=$'>$catname</a></li>";
                                echo "</ol>";
                            }
                            $editMe = mysqli_query($conn, "SELECT * from product where category_product=$chosenCat");
                        }
                        else{
                            $editMe = mysqli_query($conn, "SELECT * from product");
                            echo "<ol class='breadcrumb'>";
                            echo "<li class='active'><a href='#'>Loja</a></li>";
                            echo "</ol>";
                        }
                        while ($row = mysqli_fetch_array($editMe)){
                            $editName = $row['name_product'];
                            $editPrice = $row['price_product'];
                            $editCat = $row['category_product'];
                            $editDesc = $row['description_product'];
                            $editprice = $row['price_product'];
                            $productID =$row['id_product'];
                        $getPics = mysqli_query($conn, "SELECT * from images where id_product=$productID");
                        $i=0;
                        $editSource = Array();
                        $editImgID = Array();
                        while ($row = mysqli_fetch_array($getPics)){
                            $editSource[i] = $row['src_image'];
                            $editImgID[i] = $row['id_image'];
                        }

                        echo "<div class='col-md-4' style=''>";
                        echo "<div class='thumbnail'>";
                        echo "<div style='height:250px; text-align:center;'>";
                        if ($editSource[i]==""){
                            echo "<center><img class='img-responsive' style='height:250px;' src='img/placeholder.png' alt='$editName'><center>";
                        }
                        else{
                        echo "<center><img class='img-responsive' style='height:250px;' src='img/store/$editSource[i]' alt='$editName'><center>"; }
                        echo "</div>";
                        echo "<div class='caption'>";
                        echo "<h3 style='height:50px'>$editName</h3>";
                        echo "<p style='height:50px'>$editDesc</p>";
                        echo "<h5>€ $editprice</h5>";
                        echo "<p><a href='javascript:addCart()' id='$productID' class='btn btn-primary' role='button'>Adicionar a carrinho</a></p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";

                        }

                    ?>
                </div>
            </div>
        </div>
        <?php
            include 'tools/footer.php';
        ?>

        <script type="text/javascript">
            var modal = document.getElementById('myCart');
            var btn = document.getElementsByTagName("myBtn");
            var span = document.getElementsByClassName("close")[0];
            var btnclick ="";
            var btns = document.getElementsByClassName("btn btn-primary");
            $(btns).click(function(event) { //função que vê os clicks butões que adicionam as mensagens -- WORKING
               btnclick = event.target.id;


            });
              function removeelement(id)
              {
                         console.log("chegou aqui"+id);
                         var pa = document.getElementById("lista");
                         var toremove = document.getElementsByClassName(id);
                         pa.removeChild(toremove);
                }
            function showcart()
            {
                modal.style.display = "block";
               // console.log(modal.textContent);
            }
            function addCart() 
            {
                 if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {

                             var response = this.responseText;

            var finalres = response.split("&");
                            resposta(finalres);     

                            var response = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","itemFinder.php?id="+btnclick,true);
                    xmlhttp.send();
               modal.style.display = "block";
            }
            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>