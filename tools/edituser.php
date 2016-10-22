<?php
    $editMe = mysqli_query($conn, "SELECT * from user where user_id=$id");
    while ($row = mysqli_fetch_array($editMe)){
        $email = $row['email'];
    }
    $editMe = mysqli_query($conn, "SELECT * from customer where customer_user_id=$id");
    while ($row = mysqli_fetch_array($editMe)){
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $add = $row['address'];
        $zip = $row['zipcode'];
        $city = $row['city'];
        $tel = $row['tel'];
    }
?>
<div class="col-md-4">
    <div class="form-group">
        <label>Email</label>
        <input name="aeditEmail" class="form-control" type="text" value="<?php echo $email; ?>" required>                             
    </div>
    <div class="form-group">
        <label>Nome</label>
        <input name="aeditNome" class="form-control" type="text" value="<?php echo $fname; ?>" required>                             
    </div>
    <div class="form-group">
        <label>Apelido</label>
        <input name="aeditApelido" class="form-control" type="text" value="<?php echo $lname; ?>" required>                             
    </div>
    <div class="form-group">
        <label>Morada</label>
        <input name="aeditMorada" class="form-control" type="text" value="<?php echo $add; ?>" required>                             
    </div>
    <div class="form-group">
        <label>Código-Postal</label>
        <input name="aeditCP" class="form-control" type="text" value="<?php echo $zip; ?>" required>                             
    </div>
    <div class="form-group">
        <label>Cidade</label>
        <input name="aeditCidade" class="form-control" type="text" value="<?php echo $city; ?>" required>                             
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input name="aeditTelefone" class="form-control" type="text" value="<?php echo $tel; ?>" required>                             
    </div>
</div>
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-body">
            <label>Informação importante</label>
            <p>Clique <a href="../tools/newpassword.php?email=<?php echo $email; ?>">aqui</a> para enviar um link de palavra-passe para o e-mail deste utilizador.</p>
        </div>
    </div>
</div>
<?php
    if (isset($_POST["editAdmin"])){
        $sql = mysqli_query($conn,"UPDATE ;");
        while ($row = mysqli_fetch_array($sql)){
            $displayme = $row['name_product'];
            $displayID = $row['id_product'];
            echo "<script>$('#scrollhide').append('<a href=\'?id=$displayID\' class=\'list-group-item\'>$displayme</a>');</script>";
        }
    }
?>