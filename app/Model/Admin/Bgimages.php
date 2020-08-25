<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Bgimages extends Model
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
    protected $table = 'bg_images';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne('\App\Model\Admin\Images', 'id', 'id_image');
    }
}
