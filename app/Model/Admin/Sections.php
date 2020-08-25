<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Sections extends Model
{
    protected static function boot()
    {
        parent::boot();

        // Order by num ASC
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('num');
        });
    }
    protected $fillable = ['num','status'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function component()
    {
        return $this->hasOne('\App\Model\Admin\Components', 'id', 'id_extra_resource');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function slider()
    {
        return $this->hasOne('\App\Model\Admin\Sliders', 'id', 'id_extra_resource');
    }
}