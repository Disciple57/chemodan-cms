<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Bgimages extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_image' => $this->id_image,
            'file' => $this->image->name . '.' . $this->image->mime,
            'updated' => $this->updated_at->format('Hms'),
            'options' => $this->options ? json_decode($this->options, 1) : []
        ];
    }
}
