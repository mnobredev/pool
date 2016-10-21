<?php
    $editMe = mysqli_query($conn, "SELECT * from device where device_id=$equipID");
    while ($row = mysqli_fetch_array($editMe)){
        $editEquip = $row['device_mac'];
    }
    $pieces = explode(":", $editEquip);
?>

<div class="panel-body">
    <div class="col-md-12">
        <div class="form-group">
            <label>Indique o MAC Address do equipamento</label>
            <div class="row">
                <div class="col-xs-2">
                    <input class="form-control" type="text" class="col-md-1" name="editmac1" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" value="<?php echo $pieces[0]?>" style="text-align: center;" required>
                </div>
                <div class="col-xs-2">
                    <input class="form-control" type="text" class="col-md-1" name="editmac2" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" value="<?php echo $pieces[1]?>" style="text-align: center;" required>
                </div>
                <div class="col-xs-2">
                    <input class="form-control" type="text" class="col-md-1" name="editmac3" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" value="<?php echo $pieces[2]?>" style="text-align: center;" required>
                </div>
                <div class="col-xs-2">
                    <input class="form-control" type="text" class="col-md-1" name="editmac4" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" value="<?php echo $pieces[3]?>" style="text-align: center;" required>
                </div>
                <div class="col-xs-2">
                    <input class="form-control" type="text" class="col-md-1" name="editmac5" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" value="<?php echo $pieces[4]?>" style="text-align: center;" required>
                </div>
                <div class="col-xs-2">
                    <input class="form-control" type="text" class="col-md-1" name="editmac6" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" value="<?php echo $pieces[5]?>" style="text-align: center;" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Quais os modulos activos deste equipamento?</label>
            <div class="checkbox"><label><input type="checkbox"> PH</label></div>
            <div class="checkbox"><label><input type="checkbox"> Cloro</label></div>
            <div class="checkbox"><label><input type="checkbox"> Temperatura</label></div>
            <div class="checkbox"><label><input type="checkbox"> Profundidade</label></div>
        </div>
    </div>
</div>