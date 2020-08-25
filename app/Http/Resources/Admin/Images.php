<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class Images extends JsonResource
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
            'name' => $this->name,
            'mime' => $this->mime,
            'file' => $this->name . '.' . $this->mime,
            'size' => $this->size,
            'info' => $this->info,
            'num' => $this->num,
            'created_at' => $this->created_at->format('d.m.Y H:m'),
            'updated' => $this->updated_at->format('Hms'),
        ];
    }
}
