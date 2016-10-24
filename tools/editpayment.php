<div class="col-md-4">
    <?php
    
        $editMe = mysqli_query($conn, "SELECT * from sales where Id_sale=$id");
        while ($row = mysqli_fetch_array($editMe)){
            $cart = $row['ID_sale_invoice'];
            $nome = $row['payer_name'];
            $morada = $row['payer_address'];
            $state = $row['Pay_status'];
            echo "<div class='form-group'>";
            echo "<label>Nome do cliente: </label> $nome";
            echo "</div>"; 
            echo "<div class='form-group'>";
            echo "<label>Morada: </label> $morada";
            echo "</div>"; 
            echo "<div class='form-group'>";
            echo "<label>Estado: </label>";
            echo "<select name='taskOption' class='form-control'>";
            echo "<option value='Enviado'>Enviado</option>";
            echo "<option value='$state' selected>$state</option>";
            echo "</select>";
            echo "</div>";
        }
        $editMe = mysqli_query($conn, "SELECT * from cartitem where cartitem_cart_id=$cart");
        echo "</div>";
        echo "<div class='col-md-4'>";
        echo "<div class='form-group'>";
        echo "<label>Produtos</label>";
        while ($row = mysqli_fetch_array($editMe)){
            $prodid = $row['cartitem_product_id'];
        $edit = mysqli_query($conn, "SELECT * from product where id_product=$prodid");
        while ($row = mysqli_fetch_array($edit)){
            $product = $row['name_product'];
            echo "<input name='aeditEmail' class='form-control' type='text' value='$product' required>";
        }
        }
        echo "</div>"; 
        echo "</div>"; 
        
    ?>