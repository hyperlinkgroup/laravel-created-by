<?php

namespace Hylk\CreatedBy;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class BaseModel extends Model
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->mergeFillable([
            'created_by',
            'updated_by',
        ]);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(static function ($model) {
            if ($model->hasAttribute('created_by') && !data_get($model, 'created_by')) {
                $model->created_by = auth()->id();
            }
            if ($model->hasAttribute('updated_by') && !data_get($model, 'updated_by')) {
                $model->updated_by = auth()->id();
            }
        });
        static::updating(static function ($model) {
            if ($model->hasAttribute('updated_by') && !data_get($model, 'updated_by')) {
                $model->updated_by = auth()->id();
            }
        });
    }

    protected function hasAttribute($attribute): bool
    {
        return Schema::connection($this->getConnectionName())->hasColumn($this->getTable(), $attribute);
    }
}
