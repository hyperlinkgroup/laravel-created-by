<?php

namespace Hylk\CreatedBy;

trait WithCreatedBy
{
    /**
     * Boot the trait.
     *
     * @return void
     */
    public static function bootWithCreatedBy(): void
    {
        static::creating(static function ($model) {
            $model->created_by = auth()->id();
        });
    }
}
