<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyB8rKmOhKUNeV3Xn25qhLFoUYPOMazsTRI');

include 'tools/chave.php';
$customer_id = $_REQUEST['id'];
$sql = mysqli_query($conn, "SELECT token FROM customer WHERE customer_user_id = '".$customer_id."'");
$result ="";
while($row = mysqli_fetch_array($sql))
    $result = $row['token'];
    echo $result;
$registrationIds = ["$result"];
// prep the bundle
$msg = [
    'title'         => 'Android',
    'body'          => 'Pkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk'
];

$fields = [
    'registration_ids'  => $registrationIds,
    'notification'              => $msg
];

$headers = [
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
];
$fields = json_encode( $fields );

$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, $fields );
$result = curl_exec($ch );
curl_close( $ch );

echo $result;
?>
