<?php

namespace Hyperlink\CreatedBy;

trait WithRestoredAt
{
    /**
     * Boot the trait.
     *
     * @return void
     */
    public static function bootWithRestoredAt(): void
    {
        static::restoring(static function ($model) {
            $model->restored_at = auth()->id();
        });
    }
}
