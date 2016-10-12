<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyBqg_tSLE72fhXuUr6VEJJd7T7jCYf_0e0');

$registrationIds = ["dqXEjbxKvpk:APA91bFpjmDci5G0naR3beFFHOWcRGRswr-yWAnnOwKbcL1mMo697zpMooJwEAO8fRG3VmYxrlXz0UD00QT61AnVgqNfupvD0AI4JKR563kMw4LFU6gfNnaM-PLCH0EKVcfOe3l8Qjwt"];


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
