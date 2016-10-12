<?php 

	$id = "";
	$tk = "";
    $id = $_REQUEST['Id'];
    $tk = $_REQUEST['Token'];
    include "tools/chave.php";
		
	if(id != "" && $tk != ""){
		$sql ="UPDATE customer SET token = '$tk' WHERE customer_user_id = '$id';";
		  
		$hello = mysqli_query($conn, $sql);
		    if ($hello=="1"){
				$ar = Array("success");
				echo json_encode($ar);
			}
	}
	
 ?>