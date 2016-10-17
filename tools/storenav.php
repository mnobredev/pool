<?php
    include 'chave.php';
    $sql = mysqli_query ($conn, "select * from category");
    $counter = 0;
    while ($row = mysqli_fetch_assoc($sql)) {
        if ($row['parent_category']=="0"){
            $main[] = $row['id_category'];
            $mainname[] = $row['name_category'];
        }
        else{
            $sub[] = $row['id_category'];
            $subname[] = $row['name_category'];
            $subparent[] = $row['parent_category'];
        }
    }
?>
     
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Loja</h3>
    </div>
    <div class="panel-body">
        
        
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php
    for ($i=0; $i<count($main); $i++){
        echo "<div class='panel'>";
        echo "<div class='panel-heading' role='tab' id=h'$main[$i]'>";
        echo "<h4 class='panel-title'>";
        echo "<a style='text-style: bold;' class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#c$main[$i]' aria-expanded='true' aria-controls='c$main[$i]'>";
        echo "$mainname[$i]";
        echo "</a>";
        echo "</h4>";
        echo "</div>";
        echo "<div id='c$main[$i]' class='panel-collapse collapse' role='tabpanel' aria-labelledby='h$main[$i]'>";
        for ($j=0; $j<count($sub); $j++){
            if ($subparent[$j]==$main[$i]){
                echo "<div class='panel-body'>";
                echo "<a style='margin-left: 2%; font-size: 12px;' href='?cat=$sub[$j]'>$subname[$j]</a>";
                echo "</div>";
            }
        }
        echo "</div>";
        echo "</div>";
    }
    ?>
    
</div>
        
        
    </div>
    <div class="panel-footer">
        <a href="javascript:showcart()" class="btn btn-primary"><span style="padding: 0px;" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Ver carrinho</a>
    </div>
</div>
