<div class="col-md-6">
    <label>Ultimos 5 utilizadores inseridos</label>
    <?php
        $sql = mysqli_query($conn, "SELECT * from user where user_type='1' order by user_id desc limit 5");
        while ($row = mysqli_fetch_array($sql)){
        $userName = $row['email'];
        $userID = $row['user_id'];
        echo "<a href='?id=$userID' class='list-group-item'>$userName</a>";
        }
    ?>
</div>
<div class="col-md-6">
    <div class="row">
        <label>Pesquisar por nome</label>
        <div class="col-md-10">
            <input class="form-control" type="text" name="searchuser">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-success" style="margin-top: 1%;" name="searchProduct">Pesquisar</button>
        </div>
    </div>
    <div id="scrollhideuser" class="list-group" style="margin-top: 1%; max-height: 160px; overflow-y: scroll;">
        <?php
                if (isset($_POST[searchuser])){
            $sql = mysqli_query($conn,"SELECT * FROM user where user_type=1 and email like '%".$_POST[searchuser]."%';");
            while ($row = mysqli_fetch_array($sql)){
                $displayme = $row['email'];
                $displayID = $row['user_id'];
                echo "<script>$('#scrollhideuser').append('<a href=\'?id=$displayID\' class=\'list-group-item\'>$displayme</a>');</script>";
            }
        }
            ?>
    </div>
</div>