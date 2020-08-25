<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Constants\StorageDirectory;

class FontIcons extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function toArray($request)
    {
        $patch = StorageDirectory::FONTS . DIRECTORY_SEPARATOR . $this->name . DIRECTORY_SEPARATOR
            . $this->name . '.json';
        $data = [];
        if (Storage::exists($patch)) {
            $data =  json_decode(Storage::get($patch), true);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'num' => $this->num,
            'data' => $data,
        ];
    }
}
