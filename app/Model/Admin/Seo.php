<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';
    protected $fillable = ['resource', 'id_resource', 'meta'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function page()
    {
        return $this->hasOne('\App\Model\Pages', 'id', 'id_resource');
    }
}
