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
           // include 'tools/header.php';
            include 'tools/chave.php';
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
            <p><a href="javascript:showcart()" id="myBtn" class="btn btn-primary" role="button" >SHOW CART</a>
                
        <div class="row">
            <!--<div class="col-sm-6 col-md-3  text-left">
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
				
					<li class="row totals">
						<span class="itemName">Total:</span>
						<span class="price">To be added</span>
						<span class="order"> <a class="text-center">ORDER</a></span>
					</li>
				</ul>
            </div>-->
           <!-- <div class="col-sm-6 col-md-3">
             <div id="thumbnail">
                
                    <img src="img/store/arduino.png" alt="Arduino" width="242px" height="200px">
                    <div class="caption">
                        <h3>Thumbnail label</h3>
                        <p>ZE BEST</p>
                        <p><a href="#" class="btn btn-primary" role="button">BUY ME NOW!</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                    </div>
                </div>
            </div>-->
           
<div id="myCart" class="modal">
<div class="modal-content">
  <div class="modal-header">
    <span class="close">×</span>
    <h2>Carrinho de compras</h2>
   
  </div>
  <div class="modal-body">
      
        
      

  </div>
  <div class="modal-footer">
      <h3><i>atec.marionobre.com</i></h3>
  </div>
</div>
           </div>
    <?php
    $i=0;
        $editMe = mysqli_query($conn, "SELECT * from product");
        while ($row = mysqli_fetch_array($editMe)){
            $editName = $row['name_product'];
            $editPrice = $row['price_product'];
            $editCat = $row['category_product'];
            $editDesc = $row['description_product'];
            $editprice = $row['price_product'];
          $productID =$row['id_product'];
        
        $getCat = mysqli_query($conn, "SELECT * from category where id_category=$editCat");
        while ($row = mysqli_fetch_array($getCat)){
            $editPCat = $row['parent_category'];
        }
        $getPics = mysqli_query($conn, "SELECT * from images where id_product=$id");
        $i=0;
        $editSource = Array();
        $editImgID = Array();
        while ($row = mysqli_fetch_array($getPics)){
            $editSource[i] = $row['src_image'];
            $editImgID[i] = $row['id_image'];
        }
        
        echo "<div class='col-sm-6 col-md-3' style=''>";
        echo "<div id='thumbnail'>";
        echo "<img src='img/store/arduino.png' alt='Arduino' width='242px' height='200px'>"; 
        echo "<div class='caption'>";
        echo "<h3>Categoria: $editCat</h3>";
        echo "<p style='height:30px'>Nome: $editName</p>";
        echo "<h1>Preço: $editprice</h1>";
        echo "<p><a href='javascript:addCart()' id='$productID' class='btn btn-primary' role='button'>BUY ME NOW!</a> <a href='#' class='btn btn-default' role='button'>Button</a></p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        }
            
    ?>
     
        
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
   console.log(btnclick);
  
});

function showcart()
{
    modal.style.display = "block";
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
                console.log("RESPONSE TEXT ="+this.responseText);
                //document.getElementById("modal-body").innerHTML = this.responseText;
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