<?php
?>

<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label for="Fname">Nome</label>
            <input type="text" class="form-control" name="Fname" required>
        </div>
        <div class="col-md-6">
          <label for="Lname">Apelido</label>
          <input type="text" class="form-control" name="Lname" required>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="Address">Morada</label>
    <input type="text" class="form-control"  name="Address" required>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label for="Cpostal">Código Postal</label>
            <input type="text" class="form-control" name="Cpostal" pattern="[0-9]{4}[\-][0-9]{3}|[0-9]{4}" title="Por favor insira o seu número com as seguintes características: 0000-000 ou 0000" maxlength="8" required>
        </div>
        <div class="col-md-8">
            <label for="City">Cidade</label>
            <input type="text" class="form-control" name="City" required>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <label id='emaillabel' for="loginreg">Email</label>
            <input type="email" class="form-control" name="loginreg" required>
        </div>
        <div class="col-md-4">
            <label for="passreg">Password</label>
          <input type="password" class="form-control" name="passreg" required>
        </div>
        <div class="col-md-4">
            <label for="passreg">Telefone</label>
            <input type="text" class="form-control" name="tel" maxlength="13" pattern="[0-9\+].{8,12}" title="Formato de número sugerido: 910000000" required>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Já tenho equipamento e quero regista-lo <input type="checkbox" name="insertMac" value="" onchange="checkAddress(this)"></label><br>
    <label id="maclabel" style="visibility: hidden" for="mac1">Mac Address</label>
    <div class="row" id="macrow" style="visibility: hidden">
      <div class="col-xs-2">
          <input class="form-control" type="text" class="col-md-1" name="mac1" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;">
      </div>
      <div class="col-xs-2">
          <input class="form-control" type="text" class="col-md-1" name="mac2" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;">
      </div>
      <div class="col-xs-2">
          <input class="form-control" type="text" class="col-md-1" name="mac3" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;">
      </div>
      <div class="col-xs-2">
          <input class="form-control" type="text" class="col-md-1" name="mac4" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;">
      </div>
      <div class="col-xs-2">
          <input class="form-control" type="text" class="col-md-1" name="mac5" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;">
      </div>
      <div class="col-xs-2">
          <input class="form-control" type="text" class="col-md-1" name="mac6" size="2" pattern="[0-9A-Fa-f]{2}" maxlength="2" style="text-align: center;">
      </div>
  </div>
</div>
<script>function checkAddress(checkbox)
{
    if (checkbox.checked)
    {
        document.getElementById("macrow").style.visibility = "visible";
        document.getElementById("maclabel").style.visibility = "visible";
    }
    else{
        document.getElementById("macrow").style.visibility = "hidden";
        document.getElementById("maclabel").style.visibility = "hidden";
    }
}</script>