<?php
return [
    'client_id' => env('PAYPAL_CLIENT_ID','Ae5DGm_Y11Ogm5jsCPSGdVwQ3zjXP8aGWHoGL5s0gLCFDDRzb4e6d5tW8ibu5OJf_JSwF25m6A7q4zIr'),
    'secret' => env('PAYPAL_SECRET','EKA0jDTG6sF-izCGrlE5dDsRD7RebFBdaTLXZ7CvAp8vtJEnrbgxQsd59z5s0ZNUzKkNfs2Oea5mQI4I'),
    'settings' => array(
        'mode' => env('PAYPAL_MODE','sandbox'),
        'http.ConnectionTimeOut' => 300,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'ERROR'
    ),
];
