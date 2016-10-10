<?php
?>
<div id="addCat" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adicionar categoria</h4>
            </div>
            <form method="POST" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <lable>Indique qual a categoria principal</lable>
                        <select name="parentCat" class="form-control">
                            <option value="0">Quero introduzir uma nova categoria principal</option>
                            <?php 
                                for ($i=0; $i<count($arCatID); $i++) {
                                    if ($arCatParent[$i]==0){
                                        echo "<option value='".$arCatID[$i]."'>".$arCatName[$i]."</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Indique o nome da categoria</lable>
                        <input class="form-control" name="newCat" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" id="submitCat" name="submitCat" value="submitCat">Gravar</button>
                </div>
            </form>
        </div>
    </div>
</div>