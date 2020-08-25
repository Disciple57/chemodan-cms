<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Constants\ResourceTypes;
use Illuminate\Support\Facades\Storage;

class Sections extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function toArray($request)
    {
        $data = $this->resource;

        switch($this->extra_resource) {
            case ResourceTypes::COMPONENTS:
                $this->component;
                break;
            case ResourceTypes::SLIDERS:
                $this->slider;
                break;
            case ResourceTypes::BUILDER:
                $patch = 'store_builder_clean' . DIRECTORY_SEPARATOR . $this->id . '.html';
                if (Storage::disk('public')->exists($patch)) {
                    $data['html'] =  Storage::disk('public')->get($patch);
                }

        }
        return $data;
    }
}
