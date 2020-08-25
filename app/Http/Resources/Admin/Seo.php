<?php

namespace App\Http\Resources\Admin;

use App\Constants\ResourceTypes;
use Illuminate\Http\Resources\Json\JsonResource;

class Seo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        switch ($this->resource->resource) {
            case ResourceTypes::PAGES:
                $related = $this->page;
                break;
            default: $related = [];
        }

        return [
            'id' => $this->id,
            'related' => $related,
            'meta' => $this->meta ? json_decode($this->meta, 1) : []
        ];
    }
}
