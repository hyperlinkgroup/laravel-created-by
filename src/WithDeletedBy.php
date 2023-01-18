<?php

namespace Hyperlink\CreatedBy;

trait WithDeletedBy
{
    /**
     * Boot the trait.
     *
     * @return void
     */
    public static function bootWithDeletedBy(): void
    {
        static::deleting(static function ($model) {
            $model->deleted_by = auth()->id();
        });
    }
}
