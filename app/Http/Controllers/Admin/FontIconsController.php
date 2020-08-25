<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FontIconsRequest;
use App\Constants\{
    Mime, Type, StorageDirectory, NotificationCode as Code, NotificationMsg
};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Libs\Package;
use App\Model\Admin\Fonts;
use App\Http\Resources\Admin\FontIcons as FontIconsResource;

class FontIconsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.font_icons.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FontIconsRequest $request
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function store(FontIconsRequest $request)
    {
        $data = $request->file(Mime::FONT_SVG[0])->get();

        $data = simplexml_load_string($data);
        $data = json_encode($data);
        $data = json_decode($data, true);

        $attributes = $data['defs']['font']['font-face']['@attributes'];
        $font_family_slug = Str::slug($attributes['font-family'], '-');

        if (Fonts::where('name', $attributes['font-family'])->count()) {
            return response(['error' => 'Такой шрифт уже существует'], 402);
        }

        $font_array = [];
        $font_array['family'] = $attributes['font-family'];
        $font_array['prefix'] = $request->prefix . '-';

        foreach ($data['defs']['font']['glyph'] as $id => $glyph) {
            if (isset($glyph['@attributes']['unicode'])) {
                $unicode = json_encode($glyph['@attributes']['unicode']);
                if (mb_substr($unicode, 0, 3) == '"\u') {
                    $font_array['icons'][$id]['unicode'] = str_replace(['\u', '"'], '', $unicode);
                } else {
                    return response(['error' => 'Юникод глифа не поддерживается', 'hidemodal' => true], 402);
                }
            } else {
                return response(['error' => 'Юникод глифа не найден', 'hidemodal' => true], 402);
            }

            if (isset($glyph['@attributes']['glyph-name'])) {
                $font_array['icons'][$id]['name'] = $glyph['@attributes']['glyph-name'];
            } else {
                return response(['error' => 'Имя глифа не найдено', 'hidemodal' => true], 402);
            }
        }

        $font_array['count'] = count($font_array['icons']);

        $patch = StorageDirectory::FONTS . DIRECTORY_SEPARATOR . $font_family_slug;
        $upload = [];
        foreach (array_merge(Mime::FONTS, Mime::FONT_SVG) as $mime) {
            if ($request->hasFile($mime)) {
                $request->file($mime)->storeAs($patch, $font_family_slug . '.' . $mime);
                $upload[] = $mime;
            }
        }

        $css = view('admin.font_icons.css_generate', [
            'font_family_slug' => $font_family_slug,
            'attributes' => $attributes,
            'fonts' => $upload,
            'format' => Mime::FONT_FORMAT,
            'patch' => DIRECTORY_SEPARATOR . env('PUBLIC_PATH') . DIRECTORY_SEPARATOR . $patch,
            'icons' => $font_array,
        ]);

        $fonts = new Fonts();
        $fonts->name = $font_family_slug;
        $fonts->type = Type::FONT_ICONS;

        if ($fonts->save()
            && $fonts->update(['num' => $fonts->id])
            && Storage::put($patch . DIRECTORY_SEPARATOR . $font_family_slug . '.css', $css) // Сохраняем css
            && Storage::put($patch . DIRECTORY_SEPARATOR . $font_family_slug . '.json', json_encode($font_array)) // Сохраняем json
            && Storage::append(StorageDirectory::PATCH['FONTS'], $css) // Дополняем общий css шрифтов
        ) {
            return response(['notification' => NotificationMsg::FONTS[Code::STORE]]);
        }

        return response(['error'], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'data' => FontIconsResource::collection(Fonts::all()->where('type', Type::FONT_ICONS)),
            'mimes' => array_merge(Mime::FONTS, Mime::FONT_SVG),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $font = Fonts::findOrFail($id);
        $patch = StorageDirectory::FONTS . DIRECTORY_SEPARATOR . $font->name . DIRECTORY_SEPARATOR;

        if ($font->delete() && Storage::deleteDirectory($patch) && Package::fonts()) {
            return response(['notification' => NotificationMsg::FONTS[Code::DELETE]]);
        }

        return response(['error'], 401);
    }
}
