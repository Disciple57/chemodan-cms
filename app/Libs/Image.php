<?php

namespace App\Libs;

class Image
{
    public static function info($file) {
        $mime = $file->getClientOriginalExtension();

        if ($mime == 'svg') {
            return 0;
        }

        $size = getimagesize($file);
        return $size[0] . 'x' . $size[1];
    }
}