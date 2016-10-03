<?php
?>
<div id="editProfile" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar</h4>
      </div><form method="POST" action="">
      <div class="modal-body">
        
            <div class="form-group">
                <?php 
                echo "<label>Indique o novo ".$fieldName."</label>";
                echo "<input type='".$inputType."' class='form-control' id='newData' placeholder='".$onRecord."'>";
                ?>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary" id="submitEdit" name="submitEdit" value="submitEdit">Gravar</button>
      </div></form>
    </div>
  </div>
</div>