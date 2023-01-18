<?php

namespace Hylk\CreatedBy;

trait WithUpdatedBy
{
    /**
     * Boot the trait.
     *
     * @return void
     */
    public static function bootWithUpdatedBy(): void
    {
        static::creating(static function ($model) {
            $model->updated_by = auth()->id();
        });
        static::updating(static function ($model) {
            $model->updated_by = auth()->id();
        });
    }
}
