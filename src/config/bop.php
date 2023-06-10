<?php

return [
    'merchant_id' => env('BOP_MERCHANT_ID', '7000*****'),
    'password'    => env('BOP_PASSWORD', 'mu2*****'),
    'acquirer_id' => env('BOP_ACQUIRER_ID', '0*****'),
    'url'         => env('BOP_URL', 'https://e-commerce-uat.bop.ps/EcomPayment/RedirectAuthLink'),
    'success_url' => env('SUCCESS_URL', 'https://one-studio.fail'),
    'fail_url'    => env('FAIL_URL', 'https://one-studio.fail'),
];
