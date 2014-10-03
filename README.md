Gifty api service
===========

A PHP library to work with gifty.lt api

## Dependencies

* PHP >= 5.4

## Installation

### composer

To install Gifty with composer you need to create `composer.json` in your project root and add:

```json
{
    "require": {
        "kasp3r/gifty": "dev-master"
    }
}
```

Then run

```bash
$ wget -nc http://getcomposer.org/composer.phar
$ php composer.phar install
```

Library will be installed in vendor/kasp3r/gifty

In your project include composer autoload file from vendor/autoload.php

## Usage

```php
use Gifty\GiftyService;

$giftyService = new GiftyService('customerKey', 'customerSecret', 'userId');

$response = $giftyService
            ->setTesting(true) // to enable testing
            ->createGift('productId', 'templateId', 'recipient');

if ($response->isError()) {
    echo $response->getErrorCode() . ': ' . $response->getErrorDescription();
} else {
    echo 'Gift name: ' . $response->getGiftName();
    echo 'Gift code: ' . $response->getGiftCode();
    // ...
}
```
