<?php
$item_no            = $_REQUEST['item_number'];
$item_transaction   = $_REQUEST['tx']; 
$item_price         = $_REQUEST['amt']; 
$item_currency      = $_REQUEST['cc']; 

$price = '0.1';
$currency='USD';

if($item_price==$price && $item_currency==$currency)
{
    echo "<h1>Payment Successful</h1>\n";
    echo $item_no." ".$item_transaction." ".$item_price." ".$item_currency;
}
else
{
    echo "<h1>Payment Failed</h1>";
    echo $item_no." ".$item_transaction." ".$item_price." ".$item_currency;
}
