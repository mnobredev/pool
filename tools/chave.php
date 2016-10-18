<?php
$servername="localhost";
$username="jp1tz980_mnobre";
$password="01IqX8r19wXH"; 

$conn = mysqli_connect($servername, $username, $password);


if(!$conn)
{
	die("erro".mysqli_connect_error());
}
mysqli_select_db($conn, "jp1tz980_atec"); // nome base de dados
//mysqli_set_charset($conn, "utf_8")
?>

