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
