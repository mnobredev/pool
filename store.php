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
        <script type="text/javascript">
            var sessionvar = <?php echo $id; ?>;
        </script>
        <div class="container" style="margin-top: 5%;">  
            <div class="row">
                <div id="myCart" class="modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close">×</span>
                            <h2>Carrinho de compras</h2>
                        </div>
                        <div class="modal-body">
                            <table id="lista" class="table">
                                <tr>
                                    <th>Nome</th>
                                    <th>Preço</th>
                                    <th></th>
                                </tr>
                            </table>
                            <script>
                                function resposta(str){
                                    while (str){
                                        var pa = document.getElementById("lista");
                                        var row = pa.insertRow();
                                        var nome = row.insertCell(0);
                                        var preco = row.insertCell(1);
                                        var remove = row.insertCell(2);
                                        nome.innerHTML = str["name_product"];
                                        preco.innerHTML = " €" + str["price_product"];
                                        remove.innerHTML = "<input type='button' class='btn btn-danger' value='Remover' onClick='removeelement(this)'></a>";
                                    }
                                }
                            </script>
                            
                        </div>
                        <div class="modal-footer">
                            <a href="paypal/checkout.php" class="btn btn-primary">Finalizar Compra</a>
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
            $(btns).click(function(event) { 
               btnclick = event.target.id;
            });
            function removeelement(id){
                var i = id.parentNode.parentNode.rowIndex;
                document.getElementById("lista").deleteRow(i);

            }
            function showcart(){
                modal.style.display = "block";
            }

            function addCart(){
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } 
                else{
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200) {
                        resposta(JSON.parse(this.responseText));    
                    }
                };
                xmlhttp.open("GET","itemFinder.php?id="+btnclick+"&sess="+sessionvar,true);
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