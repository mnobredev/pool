<?php

/*
 * INICIAR AQUI A TRANSACAO - ESCREVER NA BASE DE DADOS QUE 
 * AO CLICKAR NO BUTAO BUY - quer comprar algo, mas o state 
 * da compra ainda não está aproved. só depois no pay.php é 
 * que altera a tabela referente á compra em si, para 'aproved'
 */


?>

<!DOCTYPE html>
<html>
<head>

	<title>PAGAR</title>
</head>
<body>

<form action="checkout.php" method="post">
	<label for="item">
		produto
		<input type="text" name="product">

	</label>
<label for="amount">
	Preço
	<input type="text" name="price">

</label>
<input type="submit" name="Pay">
</form>

</body>
</html>
