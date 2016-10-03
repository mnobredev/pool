    <?php
    
            $field = $_REQUEST['field'];
            $param = $_REQUEST['param'];
            $id = $_REQUEST['id'];
            $val = 0;
            
            include 'tools/chave.php';
            
            $sql = "INSERT INTO "; 
            mysqli_query ($conn, $sql);
            
            switch ($field){
                case "tel":
                    $val = 1;
                    
                break;
            
                case "zipcode":
                    $val = 2;                    
                break;
            
                case "city":
                    $val = 3;                    
                break;
            
                case "address":
                    $val = 4;                    
                break;
            
                
            }
            if($val != 0){
                
            }
            
        ?>
