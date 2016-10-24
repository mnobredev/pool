<?php
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Invoice;
require 'app/start.php';
include '../tools/chave.php'; 

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


$jdecode= json_decode($payment->toJSON(), true);

$status = $jdecode["transactions"]["0"]["related_resources"]["0"]["sale"]["state"];
$firstName=$jdecode["payer"]["payer_info"]["first_name"];
$lastName=$jdecode["payer"]["payer_info"]["last_name"];
$amount=$jdecode["transactions"]["0"]["item_list"]["items"]["0"]["quantity"];
$itemname=$jdecode["transactions"]["0"]["item_list"]["items"]["0"]["name"];
$address=$jdecode["transactions"]["0"]["item_list"]["items"]["shipping_address"];
$total=$jdecode["transactions"]["0"]["amount"]["total"];
$emailpayer=$jdecode["payer"]["payer_info"]["email"];
$invoicenumber=$jdecode["transactions"]["0"]["invoice_number"];
$fullname=$firstName." ".$lastName;
$sqlupdate = mysqli_query($conn, "Update cart SET cart_active=0 WHERE cart_id=".$invoicenumber);
$adress="";
foreach ($jdecode["transactions"]["0"]["item_list"]["shipping_address"] as $ea)
{
        $adress.=$ea." ";
}
$date=$jdecode["transactions"]["0"]["related_resources"]["0"]["sale"]["update_time"];
$sqlupdate1 = mysqli_query($conn, "UPDATE sales "
        . "SET Pay_status='".$status."', payer_name='".$fullname."', payer_email='".$emailpayer."', payer_address='".$adress."', date_purchase='".$date."' "
        . "WHERE ID_sale_invoice='".$invoicenumber."'");

echo ("<p><h3>Obrigado pela sua compra</h3></p>");
     
    echo ("<b>Detalhes de pagamento</b><br>\n");
    echo "<li>Nome: ".$firstName." ".$lastName." ".$status."</li>\n";
    echo ("<li>email: ".$emailpayer."</li>\n");
    echo ("<li>Item: ".$itemname."</li>\n");
    echo ("<li>Quantidade: ".$amount."</li>\n");
    echo ("<li>Total: ".$total."</li>\n");
    $ea="";
    echo ("<li>Morada: </li>");
    foreach ($jdecode["transactions"]["0"]["item_list"]["shipping_address"] as $ea)
    {
        echo $ea."<br />";
    }
    
   
    ?>
A sua transação foi completada com sucesso! Foi-lhe enviado a fatura da sua compra.<br> Pode ligar-se em <a href='https://www.paypal.com'>www.paypal.com</a> para ver todos os detalhes desta transacção.<br>