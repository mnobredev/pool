<?php

$txt = fgets(STDIN);

for($i=0; $i<2000; $i++)
{
	$txt=hash("sha256", $txt);
	echo $i."\n"; //retirar
}

$options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
];
$password_hash1=password_hash($txt, PASSWORD_BCRYPT, $options);
echo $password_hash1. " HASH 1\n";


$txt2 = fgets(STDIN);
if (password_verify($txt2, $password_hash1))
{
	echo "DEU";
	echo $password_hash1;
}
else
{
	echo "nao deu";
	echo $password_hash1;
}
/*

if(password_verify($txt, $finalsalt))
	{
echo "\nVALIDO";
	}
	else
	{
		echo "\nNADA";
	}*/
?>