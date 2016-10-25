<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <title>Aqua Quality Systems</title>
    </head>
    <body>
        <?php
            include '../tools/checksession.php';           
            include '../tools/chave.php';
            include "../tools/header.php";
        ?>
        <div class="container" style="margin-top: 200px">
            <div class="col-md-12">
                <h1>Pagamento efectuado com sucesso, pode seguir o estado da sua encomenda no seu <a href="../profile.php">perfil</a></h1>
                <h3>A sua transação foi completada com sucesso! Foi-lhe enviado a fatura da sua compra.<br> Pode ligar-se em <a href='https://www.paypal.com'>www.paypal.com</a> para ver todos os detalhes desta transacção.</h3>
                <?php
                    use PayPal\Api\Payment;
                    use PayPal\Api\PaymentExecution;
                    use PayPal\Api\Invoice;
                    require 'app/start.php';
                    if(!isset($_GET['success'], $_GET['paymentId'], $_GET['PayerID'])){
                        die();
                    }
                    if((bool)$_GET['success']===false){
                        die();
                    }
                    $paymentId=$_GET['paymentId'];
                    $payerId=$_GET['PayerID'];
                    $payment= Payment::get($paymentId, $paypal);
                    $execute = new PaymentExecution();
                    $execute->setPayerId($payerId);
                    try{
                        $result = $payment->execute($execute, $paypal);
                    } 
                    catch (Exception $ex) {
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
                    $address="";
                    foreach ($jdecode["transactions"]["0"]["item_list"]["shipping_address"] as $ea){
                        $address.=$ea." ";
                    }
                    $date=$jdecode["transactions"]["0"]["related_resources"]["0"]["sale"]["update_time"];
                    $sqlupdate1 = mysqli_query($conn, "UPDATE sales "
                            . "SET Pay_status='".$status."', payer_name='".$fullname."', payer_email='".$emailpayer."', payer_address='".$address."', date_purchase='".$date."' "
                            . "WHERE ID_sale_invoice='".$invoicenumber."'");
                ?>
            </div>
        </div>
    </body>
</html>
