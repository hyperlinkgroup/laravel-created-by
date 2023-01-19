# laravel-created-by

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hyperlink/laravel-created-by.svg?style=flat-square)](https://packagist.org/packages/hyperlink/laravel-created-by)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hyperlinkgroup/laravel-created-by/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hyperlinkgroup/laravel-created-by/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hyperlink/laravel-created-by.svg?style=flat-square)](https://packagist.org/packages/hyperlink/laravel-created-by)

Annoyed by writing the created by foreign user id for every model? Use our blueprint function instead

## Installation

You can install the package via composer:

```bash
composer require hyperlink/laravel-created-by
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

use Hyperlink\CreatedBy\WithCreatedBy;
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
