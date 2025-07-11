<?php

namespace App\Traits;

trait HasSort
{
    protected static function bootHasSort()
    {
        static::creating(function ($model) {
            $maxSort = $model::max('sort') ?? 0;
            $model->sort = $maxSort + 1;
        });
    }
}

