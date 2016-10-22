<?php
    if (isset($_POST[editEmail])){
        $sql = mysqli_query($conn,"UPDATE user SET email='$_POST[editEmail]' where user_id=$id;");
    }
    $editMe = mysqli_query($conn, "SELECT * from user where user_id=$id");
    while ($row = mysqli_fetch_array($editMe)){
        $email = $row['email'];
    }
?>
<div class="col-md-4">
    <div class="form-group">
        <label>Email</label>
        <input name="editEmail" class="form-control" type="text" value="<?php echo $email; ?>" required>                             
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