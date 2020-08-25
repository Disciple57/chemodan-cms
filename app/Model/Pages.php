<?php

namespace App\Model;

use App\Constants\ResourceTypes;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = [
        'name', 'url',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seo()
    {
        return $this->hasOne('\App\Model\Admin\Seo', 'id_resource', 'id')->where('resource', ResourceTypes::PAGES);
    }
}
