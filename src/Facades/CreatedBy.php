<?php

namespace Hylk\CreatedBy\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Hylk\CreatedBy\CreatedBy
 */
class CreatedBy extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Hylk\CreatedBy\CreatedBy::class;
    }
}
