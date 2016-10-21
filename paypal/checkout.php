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

include '../tools/chave.php';
/*if(!isset($_POST['product'], $_POST['price']))
{
    die();
}*/
session_start();

$id = $_SESSION["id"];

$str = mysqli_query($conn, "Select cart_id from cart WHERE cart_user_id='".$id."' and cart_active=1");
while($row = mysqli_fetch_array($str))
{
    $cartid = $row["cart_id"];
}

$array = array();
$str2 = mysqli_query($conn, "Select cartitem_product_id from cartitem WHERE cartitem_cart_id=".$cartid);
while($row = mysqli_fetch_assoc($str2))
{
    array_push($array, $row["cartitem_product_id"]);
}

$sum=0;
for($i=0; $i<sizeof($array); $i++)
{
    $str3= mysqli_query($conn, "Select price_product from product where id_product=".$array[$i]);
    while($row = mysqli_fetch_array($str3))
    {
        $sum+=$row["price_product"];
    }
}

$product = "AquaSystems";
$price = $sum;
$shipping = 2.00;

$total = $price + $shipping;

$payer = new Payer();

$payer->setPaymentMethod('paypal');

$item = new Item();
$item->setName($product)
        ->setCurrency('GBP')
        ->setQuantity(1)
        ->setPrice($price);

$itemList = new ItemList();
$itemList->setItems([$item]); //hmm

$details = new Details();
$details->setShipping($shipping)
        ->setSubtotal($price);

$amount = new Amount();
$amount->setCurrency('GBP')
        ->setTotal($total)
        ->setDetails($details);

$str3= mysqli_query($conn, "Select cart_id from cart WHERE cart_user_id=".$id." AND cart_active=1");
    while($row = mysqli_fetch_array($str3))
    {
        $idcart=$row["cart_id"];
    }


$transaction = new Transaction();
$transaction->setAmount($amount)
        ->setItemList($itemList)
        ->setDescription('Pool read app')
        ->setInvoiceNumber($idcart);


$redirectUrl = new RedirectUrls();
$redirectUrl->setReturnUrl(SITE_URL.'/pay.php?success=true')
        ->setCancelUrl(SITE_URL.'/pay.php?success=false');


$payment = new Payment();
$payment->setIntent('sale')
        ->setPayer($payer)
        
        ->setRedirectUrls($redirectUrl)
        ->setTransactions([$transaction]); 

try 
{
 $buy = mysqli_query($conn, "INSERT into sales(Id_sale_Invoice, Item_name, Amount, Pay_status) VALUES("
         ."'".$transaction->getInvoiceNumber()."',"
         ."'".$item->getName()."',"
         ."'".$amount->getTotal()."',"
         ."'".$payment->getState()."')");
}  catch (Exception $e)
{
    die($e);
   
}

try{
    $payment->create($paypal);
} catch (PayPal\Exception\PayPalConnectionException $ex) {
    echo $ex->getCode(). " CODE"; // Prints the Error Code
    echo $ex->getData(). " MESSAGE"; // Prints the detailed error message 
    die($ex);
} catch (Exception $ex) {
die($ex);
}

$approvalUrl = $payment->getApprovalLink();
header("Location:{$approvalUrl}");
