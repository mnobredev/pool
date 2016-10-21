<?php
    $editMe = mysqli_query($conn, "SELECT * from product where id_product=$id");
    while ($row = mysqli_fetch_array($editMe)){
        $editName = $row['name_product'];
        $editPrice = $row['price_product'];
        $editCat = $row['category_product'];
        $editDesc = $row['description_product'];
    }
    $getCat = mysqli_query($conn, "SELECT * from category where id_category=$editCat");
    while ($row = mysqli_fetch_array($getCat)){
        $editPCat = $row['parent_category'];
    }
    $getPics = mysqli_query($conn, "SELECT * from images where id_product=$id");
    while ($row = mysqli_fetch_array($getPics)){
        $editSource = $row['src_image'];
        $editImgID = $row['id_image'];
    }
?>

<div class="col-md-4">
    <div class="form-group">
        <label>Nome</label>
        <input name="editNameProduct" class="form-control" type="text" value="<?php echo $editName;?>" required>                        
    </div>
    <div class="form-group">
        <label>Preço</label>
        <input name="editPriceProduct" class="form-control" value="<?php echo $editPrice;?>" pattern="[0-9\.].{3,8}" type="text" required>                             
    </div>
    <div class="form-group">
        <label>Categoria </label> <a href="#" data-toggle="modal" data-target="#addCat" title="Adicionar nova categoria"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
        <select class="form-control" id="editcategory" onchange="getEditSub()">
            <option>Escolha uma opção</option>
            <?php
            for ($i=0; $i<count($arCatID); $i++) {
                if ($arCatParent[$i]==0){
                    if ($editPCat==$arCatID[$i]){
                        echo "<option selected='selected' value='".$arCatID[$i]."'>".$arCatName[$i]."</option>";
                    }
                    else{
                        echo "<option value='".$arCatID[$i]."'>".$arCatName[$i]."</option>";
                    }
                }
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>Subcategoria</label>
        <select name="editsubcat" id="editsubcat" class="form-control" required>
            <script>
                function getEditSub(){
                    var cat = document.getElementById("editcategory");
                    var chosenCat = cat.options[cat.selectedIndex].value;
                    var catName =<?php echo json_encode($arCatName); ?>;
                    var catID =<?php echo json_encode($arCatID); ?>;
                    var catParent =<?php echo json_encode($arCatParent); ?>;
                    var editCat = <?php echo json_encode($editCat); ?>;
                    var x = document.getElementById("editsubcat");
                    x.options.length = 0;
                    for (var i=0; i<catID.length; i++) {
                        var option = document.createElement("option");
                        if (catParent[i]===chosenCat){
                            option.text = catName[i];
                            option.value = catID[i];
                            if (catID[i]==editCat[0]){
                                option.selected="selected";
                            }
                            x.add(option);
                        }
                    }
                }
            </script>
            <?php echo "<script>$(document).ready(getEditSub)</script>";?>
        </select>
    </div>
</div>
<div class="form-group  col-md-8">
    <label>Descrição</label>
    <textarea name="editDescProduct" class="form-control" rows="6" type="text" value="" required><?php echo $editDesc; ?></textarea>
</div>
<div class="form-group col-md-8">
    <label>Imagens</label>

        <div class="row">
            <div class='col-md-4'>
                <div class="thumbnail">
                    <img id='editImg1' style='width: 15vw; height: 15vw;' src="../img/store/<?php echo $editSource; ?>">
                    <div class="caption">
                        <label class="btn btn-default btn-file" style="width: 100%">
                        Editar imagem<input type='file' style="display: none;" id="Inp1" name="Inp1" />
                    </label>
                    </div>
                </div>
            </div>
        </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#editImg1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#Inp1").change(function(){
            readURL(this);
        });

    </script>
</div>
