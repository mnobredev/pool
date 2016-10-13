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
        
        <div class="container" style="margin-top: 2%;">
            
                
        <div class="row">
        
           
<div id="myCart" class="modal fade">
    <div class="modal-dialog" role="document">
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
         function resposta(str)
         {
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
    
             //li.innerHTML = str[0]+" "+str[1]+" "+str[2];  
         }
        
          </script>
            </div>
  <div class="modal-footer">
      <h3><i>atec.marionobre.com</i></h3>
  </div>
</div></div>
</div>
           <div class="col-md-2">  
    <?php
    include 'tools/storenav.php';
    ?>
           </div>
           <div class="col-md-10"> 
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
        
        echo "<div class='col-md-4' style=''>";
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