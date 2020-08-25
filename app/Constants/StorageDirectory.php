<?php

namespace App\Constants;

class StorageDirectory
{
    const FONTS = 'fonts';
    const COLORS = 'colors';
    const CSS = 'css';
    const IMAGES = 'img';
    const JAVASCRIPT = 'js';
    const COMPONENTS = 'components';
    const FILES = 'files';
    const MAIN = 'main';

    const PATCH = [
        'FONTS' => self::FONTS . DIRECTORY_SEPARATOR . 'fonts.css',
        'COLORS' => self::COLORS . DIRECTORY_SEPARATOR . 'colors.css',
        'BG_IMAGES' => self::IMAGES . DIRECTORY_SEPARATOR . 'bg_images.css',
    ];
}