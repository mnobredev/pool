<?php

require 'vendor/autoload.php';


define(SITE_URL, 'http://atec.marionobre.com/paypal');


$paypal = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
                'AbjbnCpK7kK1NuQfv9lvZZoSsnIVs2BaUVR6RMPqobD6xgrd7u9JXxxIBmFpOFas8bBp8kysK3DBuZ-p',
                'EAwnI5d2wipExJAjhjHVj64_D__YwsSkbYeb9wrW662YRlKvE7IWKHXzSk0UNz8yxadZM7fOO_bnFttg'
                )
        
        );


