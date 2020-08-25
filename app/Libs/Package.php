<?php

namespace App\Libs;

use App\Constants\{
    StorageDirectory, ResourceTypes, Status
};
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Admin\Bgimages as BgimagesResource;
use App\Model\Admin\{
    Colors, Fonts, Bgimages, Sections, Components, Sliders, Seo
};

class Package
{
    /**
     * Цвет
     *
     * @return bool
     */
    public static function color(): bool
    {
        $css = view('admin.colors.package', ['colors' => Colors::all()->toArray()]);
        return Storage::put(StorageDirectory::PATCH['COLORS'], $css);
    }

    /**
     * Шрифты
     *
     * @return bool
     */
    public static function fonts(): bool
    {
        $css = '';
        foreach (Fonts::all()->toArray() as $font) {
            $patch_file = StorageDirectory::FONTS . DIRECTORY_SEPARATOR . $font['name'] . DIRECTORY_SEPARATOR . $font['name'] . '.css';
            if (Storage::exists($patch_file)) {
                $css .= Storage::get($patch_file);
            }
        }
        return Storage::put(StorageDirectory::PATCH['FONTS'], $css);
    }

    /**
     * Фоновые изображения
     *
     * @return bool
     */
    public static function bgImages(): bool {
        $css = view('admin.bg_images.package', [
            'bg_images' => BgimagesResource::collection(Bgimages::all())->resolve(),
            'patch' => StorageDirectory::IMAGES
        ]);
        return Storage::put(StorageDirectory::PATCH['BG_IMAGES'], $css);
    }

    /**
     * Объединение всех css, js файлов
     *
     * @return bool
     */
    public static function combine(): bool {
        $css = Storage::exists('app.css') ? Storage::get('app.css') : '';
        $js = Storage::exists('app.js') ? Storage::get('app.js') : '';

        foreach(StorageDirectory::PATCH as $val) {
            $css .= self::minify(Storage::exists($val) ? Storage::get($val) : '');
        }

        foreach (Components::all()->toArray() as $component) {
            $patch = StorageDirectory::COMPONENTS . DIRECTORY_SEPARATOR . $component['filename'] . DIRECTORY_SEPARATOR . $component['filename'];
            if ($component['css'] != null && Storage::exists($patch . '.css')) {
                $css .= self::minify(Storage::get($patch . '.css'));
            }
            if ($component['js'] != null && Storage::exists($patch . '.js')) {
                $js .= self::minify(Storage::get($patch . '.js'));
            }
        }

        return Storage::put(StorageDirectory::MAIN . '.css', $css) && Storage::put(StorageDirectory::MAIN . '.js', $js);
    }

    /**
     * Страница
     *
     * @param int $id
     * @param string $modify
     * @return bool
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function page(int $id, string $modify): bool {

        $sections = Sections::query()
            ->where('resource', ResourceTypes::PAGES)
            ->where('id_Resource', $id)
            ->where('status', Status::PUBLISHED)
            ->get();

        $content = '';

        foreach ($sections as $section) {
            switch ($section->extra_resource) {
                case ResourceTypes::COMPONENTS:
                    if ($section->id_extra_resource != null) {
                        $component = Components::findOrFail($section->id_extra_resource)->toArray();
                        $patch = StorageDirectory::COMPONENTS . DIRECTORY_SEPARATOR . $component['filename'] . DIRECTORY_SEPARATOR . $component['filename'];
                        if ($component['html'] != null && Storage::exists($patch . '.html')) {
                            $content .= Storage::get($patch . '.html');
                        }
                    }
                    break;
                case ResourceTypes::BUILDER:
                    $patch = 'store_builder_clean' . DIRECTORY_SEPARATOR . $section->id . '.html';
                    $content .= Storage::disk('public')->exists($patch) ? Storage::disk('public')->get($patch) : '';
                    break;
                case ResourceTypes::SLIDERS:
                    $content .= self::slider($section->id_extra_resource);
                    break;
            }
        }

        $meta = Seo::where('resource', ResourceTypes::PAGES)->where('id_resource', $id)->first();
        if ($meta) {
            $meta = json_decode($meta->meta, 1);
            $meta = view('admin.seo.package', ['meta' => $meta]);
        } else {
            $meta = '';
        }

        $content = view('admin.pages.package', ['modify' => $modify, 'meta' => $meta, 'content' => $content]);

        return Storage::disk('views')->put('pages/' . $id . '.blade.php', $content);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    private static function slider($id) {
        $settings = Sliders::findOrFail($id)->first()->settings;
        $sections = Sections::query()
            ->where('resource', ResourceTypes::SLIDERS)
            ->where('id_Resource', $id)
            ->where('status', Status::PUBLISHED)
            ->get();
        $content = '';
        foreach ($sections as $section) {
            $patch = 'store_builder_clean' . DIRECTORY_SEPARATOR . $section->id . '.html';
            $content .= Storage::disk('public')->exists($patch) ? Storage::disk('public')->get($patch) : '';
        }
        $setting = json_decode($settings, 1);
        $js = view('admin.sliders.js_package', ['id' => $id, 'settings' => $setting]);
        Storage::append(StorageDirectory::MAIN . '.js', self::minify($js));

        return view('admin.sliders.html_package', ['id' => $id, 'content' => $content, 'settings' => $setting]);
    }

    /**
     * @param string $code
     * @return string
     */
    private static function minify(string $code): string
    {
        $code = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $code);
        $code = str_replace(["\r", "\n", "\t"], '', $code);
        $code = preg_replace('/[ ]{2,}/', '', $code);
        return $code;
    }
}