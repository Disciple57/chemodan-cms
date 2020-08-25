<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FontsRequest;
use App\Constants\{
    Mime, Type, StorageDirectory, NotificationCode as Code, NotificationMsg
};
use Illuminate\Support\Facades\Storage;
use App\Libs\Package;
use App\Model\Admin\Fonts;

class FontsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.fonts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FontsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FontsRequest $request)
    {
        $patch = StorageDirectory::FONTS . DIRECTORY_SEPARATOR . $request->name;
        $upload = [];
        foreach (Mime::FONTS as $mime) {
            if ($request->hasFile($mime)) {
                $request->file($mime)->storeAs($patch, $request->name . '.' . $mime);
                $upload[] = $mime;
            }
        }

        $css = view('admin.fonts.css_generate', [
            'name' => $request->name,
            'fonts' => $upload,
            'format' => Mime::FONT_FORMAT,
            'patch' => DIRECTORY_SEPARATOR . env('PUBLIC_PATH') . DIRECTORY_SEPARATOR . $patch,
        ]);

        $fonts = new Fonts();
        $fonts->name = $request->name;
        $fonts->type = Type::FONT_DEFAULT;
        if ($fonts->save()
            && $fonts->update(['num' => $fonts->id])
            && Storage::put($patch . DIRECTORY_SEPARATOR . $request->name . '.css', $css) // Сохраняем css
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
            'data' => Fonts::where('type', Type::FONT_DEFAULT)->get()->toArray(),
            'mimes' => Mime::FONTS,
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

    /**
     * Sortable the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sortable(Request $request)
    {
        if ($request->has('sortable')) {
            $sortable = json_decode($request->sortable, 1);

            foreach ($sortable as $key => $val) {
                if (is_int($key) && is_int($val)) {
                    Fonts::findOrFail($val)->update(['num' => $key, 'timestamps' => false]);
                } else {
                    return response(['error'], 401);
                }
            }
            return response(['notification' => NotificationMsg::COLORS[Code::SORTING]]);
        }
    }
}
