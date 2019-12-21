<?php
defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );

/**
 * Payment Environment Config
 *
 * Payment Environments are sandbox and securepay
 */
$config['payment_environment'] = 'securepay';
$config['gateway']             = 'ssl';


$config['ssl'] = [
    'securepay' => [
        'store_id'            => 'Banglamedexamlive',
        'store_password'      => '5AB3814D60BB956901',
        'store_url'           => 'banglamedexam.com',
        'url'                 => 'https://securepay.sslcommerz.com',
        'trans_url'           => 'https://securepay.sslcommerz.com/gwprocess/v3/api.php',
        'validation_soap_url' => 'https://securepay.sslcommerz.com/validator/api/validationserverAPI.php?wsdl',
        'validation_rest_url' => 'https://securepay.sslcommerz.com/validator/api/validationserverAPI.php',
    ],
    'sandbox'   => [
//                'store_id'            => 'testbox',
//                'store_password'      => 'qwerty',
        'store_id'            => 'bigmr5ac06adce6e40', //bigmr5ac06adce6e40
        'store_password'      => 'bigmr5ac06adce6e40@ssl', // bigmr5ac06adce6e40@ssl
        'store_url'           => 'http://localhost/banglamedexam',
        'url'                 => 'https://sandbox.sslcommerz.com',
        'trans_url'           => 'https://sandbox.sslcommerz.com/gwprocess/v3/api.php',
        'validation_soap_url' => 'https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?wsdl',
        'validation_rest_url' => 'https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php',
    ],
];
