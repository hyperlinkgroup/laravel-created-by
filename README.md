# Annoyed by writing the created by foreign user id for every model? Use our blueprint function instead

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hylk/laravel-created-by.svg?style=flat-square)](https://packagist.org/packages/hylk/laravel-created-by)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hylk/laravel-created-by/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hylk/laravel-created-by/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/hylk/laravel-created-by/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/hylk/laravel-created-by/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hylk/laravel-created-by.svg?style=flat-square)](https://packagist.org/packages/hylk/laravel-created-by)

## Installation

You can install the package via composer:

```bash
composer require hylk/laravel-created-by
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-created-by-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
Schema::create('foo', function (Blueprint $table) {
    $table->id();
    $table->createdBy();
    $table->updatedBy();
    $table->deletedBy();
    $table->restoredBy();
    $table->timestamps();
    $table->softDeletes();
    $table->restoredAt();
});
```
```php
<?php

namespace App\Models;

use Hylk\CreatedBy\WithCreatedBy;
use Illuminate\Database\Eloquent\Model;

class Foo extends Model
{
    use WithCreatedBy;
    use WithUpdatedBy;
    use WithDeletedBy;
    use WithRestoredBy;
    use WithRestoredAt;
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [Katalam](https://github.com/Katalam)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
