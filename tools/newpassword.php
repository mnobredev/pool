<?php
$to = $_GET['email'];
$subject = "Pedido de nova password";
$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <title>Demystifying Email Design</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
    </head>
    <body>
        <table align='center' border='0' cellpadding='0' cellspacing='0' width='600'>
            <tr>
                <td align='center' bgcolor='#337ab7' style='padding: 40px 0 30px 0;'>
                    <h1 style='color: #FFFFFF'>Aqua Quality Systems<h1>
                </td>
            </tr>
            <tr>
                <td bgcolor='#ffffff'>
                    <div style='padding: 40px 30px 40px 30px;'>
                        <p>Foi solicitada nova password para esta conta.</p>
                        <p>Pode clicar no seguinte <a href='http://atec.marionobre.com/newpassword?mail=$mail&token=$tkn'>link</a> para registar a sua nova palavra-passe.</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td bgcolor='#337ab7' style='text-align: justify; padding: 30px; color: #ffffff'>
                    <p>Contacte-nos através do nosso endereço de e-mail: <a href='mailto:admin@marionobre.com' target='_top'>admin@marionobre.com</a></p>
                    <p>© 2016 ATEC - Academia de Formação</p>
                </td>
            </tr>
        </table>
    </body>
</html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Aqua Quality Systems <admin@marionobre.com>' . "\r\n";
mail($to,$subject,$message,$headers);
?>

<script>
window.onload = function () {
    window.history.back();
}
</script>
