<div class="panel-body">
    <div class="col-md-6">
        <div class="list-group">
            <label>Ultimos 5 equipamentos inseridos</label>
            <?php
                $sql = mysqli_query($conn, "SELECT * from device order by device_id desc limit 5");
                while ($row = mysqli_fetch_array($sql)){
                $equipName = $row['device_mac'];
                $equipID = $row['device_id'];
                echo "<a href='?id=$equipID' class='list-group-item'>$equipName</a>";
                }
            ?>
        </div>
    </div>
    <div class="col-md-6">
            <div class="row">
                <label>Quero pesquisar por um MAC Address  <small>Insira o MAC separado por ":" (sem aspas).</small></label>
                <div class="col-md-10">
                    <input class="form-control" id="lookup" name="lookup" type="text">
                </div>
                <div class="col-md-2">
                    <button type="submit" name="searchdev" id="searchdev" class="btn btn-success">Pesquisar</button>
                </div>
            </div>
        <div id="scrollhide" class="list-group" style="margin-top: 1%; max-height: 160px; overflow-y: scroll;">
            <?php
                if (isset($_POST[searchdev])){
                $sql = mysqli_query($conn,"SELECT * FROM device where device_mac like '%".$_POST[lookup]."%';");
                while ($row = mysqli_fetch_array($sql)){
                    $displayme = $row['device_mac'];
                    $displayID = $row['device_id'];
                    echo "<script>$('#scrollhide').append('<a href=\'?id=$displayID\' class=\'list-group-item\'>$displayme</a>');</script>";
                }
            }
            ?>
        </div>
    </div>
</div>