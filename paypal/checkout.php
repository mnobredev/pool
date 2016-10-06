<?php
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'app/start.php';
echo '1';
if(!isset($_POST['product'], $_POST['price']))
{
    die();
}
echo '1';
$product = $_POST['product'];
$price = $_POST['price'];
$shipping = 2.00;

$total = $price + $shipping;
echo '1';
$payer = new Payer();
$payer->setPaymentMethod('paypal');




$item = new Item();
$item->setName($product)
        ->setCurrency('GBP')
        ->setQuantity(1)
        ->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setShipping($shipping)
        ->setSubtotal($price);

$amount = new Amount();
$amount->setCurrency('GBP')
        ->setTotal($total)
        ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription('lolol')
        ->setInvoiceNumber(uniqid());


$redirectUrl = new RedirectUrls();
$redirectUrl->setReturnUrl(SITE_URL.'/pay.php?success=true')
        ->setCancelUrl(SITE_URL.'/pay.php?success=false');


$payment = new Payment();
$payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrl)
        ->setTransactions([$transaction]);  


include '../tools/chave.php'; // WORKING agora é só necessário definir o que queremos guardar - fazer update no pay, status complete/aproved
try
{
 $buy = mysqli_query($conn, "INSERT into sales(id_sale, nameitem, quantity) VALUES("
         ."'".$payment->getId()."',"
         ."'".$item->getName()."',"
         ."'".$amount->getTotal()."')");
}  catch (Exception $e)
{
    die($e);
   
}

try{
    $payment->create($paypal);
} catch (Exception $ex) {
die($ex);
}

$approvalUrl = $payment->getApprovalLink();
header("Location:{$approvalUrl}");
