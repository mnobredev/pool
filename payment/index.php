<?php

$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
$paypal_id='poolreadapp@gmail.com'; 
?>
<h4>Bemvindo</h4>

<div class="product">            
    <div class="image">
       
    </div>
    <div class="name">
       Teste pagamento
    </div>
    <div class="price">
        Price:$0.1
    </div>
    <div class="btn"> <!-- Alterar elementos para o objecto a vender -->
    <form action="<?php echo $paypal_url; ?>" method="post" name="frmPayPal1">
    <input type="hidden" name="business" value="<?php echo $paypal_id; ?>">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="item_name" value="Payment">
    <input type="hidden" name="item_number" value="1">
    <input type="hidden" name="credits" value="510">
    <input type="hidden" name="userid" value="1">
    <input type="hidden" name="amount" value="0.1">
    <input type="hidden" name="cpp_header_image" value="">
    <input type="hidden" name="no_shipping" value="1">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="handling" value="0">
    <input type="hidden" name="cancel_return" value="">
    <input type="hidden" name="return" value="">
    <input type='hidden' name='cancel_return' value='http://localhost:90/pool/payment/cancel.php'>
	<input type='hidden' name='return' value='http://localhost:90/pool/payment/success.php?item_name&'>
    <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form> 
    </div>
</div>

