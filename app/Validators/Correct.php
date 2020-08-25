<?php
namespace App\Validators;
use Illuminate\Http\UploadedFile;

class Correct
{
    /**
     * @param $attribute
     * @param UploadedFile $file
     * @param $allow
     * @return bool
     */
    public function mime($attribute, UploadedFile $file, $allow)
    {
        return in_array($file->getClientOriginalExtension(), $allow);
    }

    /**
     * @param $attribute
     * @param UploadedFile $file
     * @param $allow
     * @return bool
     */
    public function mimeTypes($attribute, UploadedFile $file, $allow)
    {
        return in_array($file->getClientMimeType(), $allow);
    }

    /**
     * @param $attribute
     * @param UploadedFile $file
     * @return bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function svgFont($attribute, UploadedFile $file)
    {
        libxml_use_internal_errors(true);
        $data = simplexml_load_string($file->get());
        if(!$data) {
            return false;
        }

        $data = json_encode($data);
        $data = json_decode($data, true);

        if(empty($data['defs'])) {
            return false;
        }

        if(empty($data['defs']['font'])) {
            return false;
        }

        if(empty($data['defs']['font']['font-face'])) {
            return false;
        }

        if(empty($data['defs']['font']['font-face']['@attributes']['font-family'])) {
            return false;
        }

        if(empty($data['defs']['font']['glyph']) && !is_array($data['defs']['font']['glyph'])) {
            return false;
        }

        if(!count($data['defs']['font']['glyph'])) {
            return false;
        }

        return true;
    }

}