<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'created_at' => $this->created_at->format('d.m.Y H:m'),
            'updated_at' => $this->updated_at ? $this->updated_at->format('d.m.Y H:m') : null,
        ];
    }
}
