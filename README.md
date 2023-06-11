# one-studio bop package

## integration with PowerCARD-eCommerce

[![Latest Version on Packagist](https://packagist.org/packages/mamoun2020/bop)](https://packagist.org/packages/mamoun2020/bop)

## Install

You can install the package via Composer:

```bash
composer require mamoun2020/bop
```

In L5.4 or below start by registering the package's the service provider and facade:

```php
// config/app.php

'providers' => [
    ...
    Mamoun2020\Bop\BopServiceProvider::class,
],

```

*The facade is optional, but the rest of this guide assumes you're using the facade.*

Next, publish the config files:

```bash
php artisan vendor:publish --provider="Mamoun2020\Bop\BopServiceProvider" --tag="config"
```
then, 
```bash
php artisan migrate
```

## Security

If you've found a bug regarding security please mail [mamounkamal21@gmail.com](mailto:mamounkamal21@gmail.com) instead of using the issue tracker.

## usage 
```php
// api route  
basicUrl/api/bop/pay?order_id=1
```
(In nuxt application)
- Order table 
- morph relation with any model make it payable 
- pay function to return response json (in this function provided code processes a payment request. It retrieves configuration values, fetches an order based on the provided ID,
and generates various parameters required for the payment process. These parameters include the URL, version, merchant ID, acquirer ID, response URL, formatted purchase amount, currency, currency exponent, order ID, capture flag, base64-encoded SHA1 signature, and signature method. The function then returns these parameters as a JSON response) 
- callback to redirect fail or success page 

## wait in-progress
[integration with ecommerce(blade form support or mobile web view) ]
- support multi currency [now just ILS]
- support blade form 
- support enum (order status)
- support multi driver 
