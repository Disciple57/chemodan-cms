<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Images extends Model
{
    protected static function boot()
    {
        parent::boot();

        // Order by num ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('num');
        });
    }

    protected $fillable = ['num'];
}
