<div class="col-md-6">
    <label>Ultimos 5 administradores inseridos</label>
    <?php
        $sql = mysqli_query($conn, "SELECT * from user where user_type='2' order by user_id desc limit 5");
        while ($row = mysqli_fetch_array($sql)){
        $admName = $row['email'];
        $admID = $row['user_id'];
        echo "<a href='?idadm=$admID' class='list-group-item'>$admName</a>";
        }
    ?>
</div>
<div class="col-md-6">
    <div class="row">
        <label>Pesquisar por nome</label>
        <div class="col-md-10">
            <input class="form-control" type="text" name="searchadm">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success" style="margin-top: 1%;" name="searchProduct">Pesquisar</button>
        </div>
    </div>
    <div id="scrollhide" class="list-group" style="margin-top: 1%; max-height: 160px; overflow-y: scroll;">
        <?php
                if (isset($_POST[searchadm])){
            $sql = mysqli_query($conn,"SELECT * FROM user where user_type=2 and email like '%".$_POST[searchadm]."%';");
            while ($row = mysqli_fetch_array($sql)){
                $displayme = $row['email'];
                $displayID = $row['user_id'];
                echo "<script>$('#scrollhide').append('<a href=\'?idadm=$displayID\' class=\'list-group-item\'>$displayme</a>');</script>";
            }
        }
            ?>
    </div>
</div>