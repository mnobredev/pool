<div class="col-md-6">
    <label>Encomendas por enviar</label>
    
        <?php
            $sql = mysqli_query($conn, "SELECT * from sales where Pay_status='completed'");
            while ($row = mysqli_fetch_array($sql)){
            $saleid = $row['Id_sale'];
            $seller = $row['payer_name'];
            echo "<a href='?id=$saleid' class='list-group-item'>$seller </a>";
            }
        ?>
    
</div>
<div class="col-md-6">
    <div class="row">
        <label>Filtrar por outras encomendas</label><br>
        <label>Data da encomenda</label>
        <input class="form-control" type="date" name="datePayment">
        <label>Nome do cliente</label>
        <input class="form-control" type="text" name="namePayment">
        <button type="submit" class="btn btn-success" style="margin-top: 1%;" name="searchPayment">Pesquisar</button>
        <div id="scrollhide" class="list-group" style="margin-top: 1%; max-height: 160px; overflow-y: scroll;">
            <?php
                if (isset($_GET[namePayment])){
                    $sql = mysqli_query($conn,"SELECT * FROM sales where payer_name like '%".$_GET[namePayment]."%' and date_purchase like '%".$_GET[datePayment]."%';");
                    while ($row = mysqli_fetch_array($sql)){
                        $displayme = $row['payer_name'];
                        $displayID = $row['Id_sale'];
                        echo "<script>$('#scrollhide').append('<a href=\'?id=$displayID\' class=\'list-group-item\'>$displayme</a>');</script>";
                    }
                }
            ?>
        </div>
    </div>
</div>