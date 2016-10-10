<div class="col-md-6">
    <label>Ultimos 5 produtos inseridos</label>
    <?php
        $sql = mysqli_query($conn, "SELECT * from product order by id_product desc limit 5");
        while ($row = mysqli_fetch_array($sql)){
        $prodName = $row['name_product'];
        $prodID = $row['id_product'];
        echo "<a href='?id=$prodID' class='list-group-item'>$prodName</a>";
        }
    ?>
</div>
<div class="col-md-6">
    <div class="row">
        <label>Pesquisar por nome</label>
        <div class="col-md-10">
            <input class="form-control" type="text" name="tobeSearched">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success" style="margin-top: 1%;" name="searchProduct">Pesquisar</button>
        </div>
    </div>
    <div id="scrollhide" class="list-group" style="margin-top: 1%; max-height: 160px; overflow-y: scroll;">

    </div>
</div>