<?php
$servername="localhost";
$username="root";
$password=""; 

$conn = mysqli_connect($servername, $username, $password);


if(!$conn)
{
	die("erro".mysqli_connect_error());
}
mysqli_select_db($conn, "nome_base_de_dados"); // nome base de dados
mysqli_set_charset($conn, "utf_8")
?>

