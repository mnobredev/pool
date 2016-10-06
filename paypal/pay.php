<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Invoice;
require 'app/start.php';

if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])){
    die();
}

if((bool)$_GET['success']===false)
{
    die();
}


$paymentId=$_GET['paymentId'];
$payerId=$_GET['PayerID'];

$payment= Payment::get($paymentId, $paypal);

$execute = new PaymentExecution();
$execute->setPayerId($payerId);


try{
    $result = $payment->execute($execute, $paypal);
} catch (Exception $ex) {
$data = json_decode($ex->getData());
var_dump($data);
die();
}


//inserir na base de dados só aqui é que se confirma o pagamento
$jdecode= json_decode($payment->toJSON(), true);
$firstName=$jdecode["payer"]["payer_info"]["first_name"];
$lastName=$jdecode["payer"]["payer_info"]["last_name"];
$amount=$jdecode["transactions"]["0"]["item_list"]["items"]["0"]["quantity"];
$itemname=$jdecode["transactions"]["0"]["item_list"]["items"]["0"]["name"];
$address=$jdecode["transactions"]["0"]["item_list"]["items"]["shipping_address"];
echo ("<p><h3>Obrigado pela sua compra</h3></p>");
     
    echo ("<b>Detalhes de pagamento</b><br>\n");
    echo "<li>Nome: ".$firstName." ";
    echo $lastName."</li>\n";
    echo ("<li>Item: ".$itemname."</li>\n");
    echo ("<li>Quantidade: ".$amount."</li>\n");
    echo ("");
    $ea="";
    foreach ($jdecode["transactions"]["0"]["item_list"]["items"]["shipping_address"] as $ea)
    {
        echo $ea;
    }
    
   
    ?>
A sua transação foi completada com sucesso! Foi-lhe enviado a fatura da sua compra.<br> Pode ligar-se em <a href='https://www.paypal.com'>www.paypal.com</a> para ver todos os detalhes desta transacção.<br>