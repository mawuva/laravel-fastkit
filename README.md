# Utils to deal quickly and easily with laravel or lumen project

A useful toolkit for a quick start with laravel or lumen...
It can also help you in your rest api development with these last

## Installation

You can install the package via composer:

```bash
composer require mawuekom/laravel-fastkit
```

This package use : <br/> <br/>

 - [Laravel-data-repository](https://packagist.org/packages/mawuekom/laravel-data-repository)

 Check on it for good installation

## Usage

### Laravel <br/>

Go to **config/app.php**, and add this in the providers key

```php
'providers' =>
    ...
    Mawuekom\Fastkit\FastkitServiceProvider::class
    ...
];
```
<br/>

Publish package config

```bash
php artisan vendor:publish --provider="Mawuekom\Fastkit\FastkitServiceProvider"
```

Go to **`App\Http\Kernel.php`**, and add this in the specified key

```php
protected $routeMiddleware = [
    ...
    'cors' => Fruitcake\Cors\HandleCors::class
    'sanitized_request' => \Mawuekom\Fastkit\Http\Middleware\SanitizedRequest::class,
    'api_localization' => \Mawuekom\Fastkit\Http\Middleware\ApiLocalization::class,
    'check_id' =>  \Mawuekom\Fastkit\Http\Middleware\CheckResourceID::class
    ...
];
```

### Lumen <br/>

Go to **`bootstrap/app.php`**, and add this in the specified key

```php

$app->middleware([
    ...
    Fruitcake\Cors\HandleCors::class,
    ...
]);

$app->routeMiddleware([
    ...
    'cors' => Fruitcake\Cors\HandleCors::class
    'sanitized_request' => \Mawuekom\Fastkit\Http\Middleware\SanitizedRequest::class,
    'api_localization' => \Mawuekom\Fastkit\Http\Middleware\ApiLocalization::class,
    'check_id' =>  \Mawuekom\Fastkit\Http\Middleware\CheckResourceID::class
    ...
]);

// Add provider also
$app->register(Mawuekom\Fastkit\FastkitServiceProvider::class);

```

### Once done, enjoy it

## Report bug
Contact me on Twitter [@ephraimseddor](https://twitter.com/ephraimseddor)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

