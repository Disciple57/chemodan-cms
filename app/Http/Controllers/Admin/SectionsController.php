<?php

namespace App\Http\Controllers\Admin;

use App\Constants\ResourceTypes;
use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Model\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Admin\{
    Sections as SectionsResource, Images as ImagesResource, Bgimages as BgimagesResource, FontIcons as FontIconsResource
};

use App\Constants\{
    Type, NotificationCode as Code, NotificationMsg
};
use App\Model\Admin\{
    Sections, Colors, Fonts, Images, Bgimages, Components, Sliders
};

class SectionsController extends Controller
{
    /**
     * @param string $resource
     * @param int $id_resource
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(string $resource, int $id_resource)
    {
        switch ($resource) {
            case ResourceTypes::PAGES:
                $name = Pages::findOrFail($id_resource)->name;
                break;
            case ResourceTypes::SLIDERS:
                $name = Sliders::findOrFail($id_resource)->name;
                break;
            default:
                $name = '';
        }
        return view('admin.sections.index', [
            'resource' => $resource,
            'name' => $name,
            'components' => Components::all(['id', 'name'])->toArray(),
            'sliders' => Sliders::all(['id', 'name'])->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(string $resource, int $id_resource, Request $request)
    {
        if (Sections::all()
            ->where('resource', $resource)
            ->where('id_resource', $id_resource)
            ->where('extra_resource', $request->extra_resource)
            ->where('id_extra_resource', $request->id_extra_resource)
            ->count()) {
            switch ($request->extra_resource) {
                case ResourceTypes::SLIDERS:
                    return response('Слайдер уже подключен', 400);
                    break;
                case ResourceTypes::COMPONENTS:
                    return response('Компонент уже подключен', 400);
                    break;
            }
        }

        $section = new Sections();
        $section->resource = $resource;
        $section->id_resource = $id_resource;
        $section->status = $request->status ?? Status::DRAFT;
        $section->extra_resource = $request->extra_resource;
        $section->id_extra_resource = $request->id_extra_resource;
        if ($section->save() && $section->update(['num' => $section->id])) {
            return response(['notification' => NotificationMsg::SECTIONS[Code::STORE]]);
        }
        return response(['error'], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $resource, int $id_resource)
    {
        return response([
            'data' => SectionsResource::collection(Sections::all()
                ->where('resource', $resource)
                ->where('id_resource', $id_resource)),
            'resource_type' => [
                'builder' => ResourceTypes::BUILDER,
                'slider' => ResourceTypes::SLIDERS,
                'component' => ResourceTypes::COMPONENTS
            ]
        ]);
    }

    /**
     * @param string $resource
     * @param int $id_resource
     * @param $id_section
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function edit(string $resource, int $id_resource, $id_section)
    {
        switch ($resource) {
            case ResourceTypes::PAGES:
                $model = Pages::class;
                break;
            case ResourceTypes::SLIDERS:
                $model = Sliders::class;
                break;
            default:
                return redirect(env('ADMIN_PANEL_URI'));
        }

        $patch = 'store_builder_clean' . DIRECTORY_SEPARATOR . $id_section . '.html';
        $html = '';
        if (Storage::disk('public')->exists($patch)) {
            $html = Storage::disk('public')->get($patch);
        }

        return view('admin.builder.index', [
            'resource' => $resource,
            'id_resource' => $id_resource,
            'id' => $id_section,
            'name' => $model::find($id_resource)->name,
            'html' => $html,
            'pages' => Pages::all()->toArray(),
            'colors' => Colors::all('id', 'color')->toArray(),
            'fonts' => Fonts::where('type', Type::FONT_DEFAULT)->get('name')->toArray(),
            'font_icons' => FontIconsResource::collection(Fonts::all()->where('type', Type::FONT_ICONS))->resolve(),
            'images' => ImagesResource::collection(Images::all())->resolve(),
            'bg_images' => BgimagesResource::collection(Bgimages::all())->resolve()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $resource, int $id_resource, int $id_section)
    {
        Storage::disk('public')->put('store_builder_clean/' . $id_section . '.html', $request->html);
        Sections::findOrFail($id_section)->update(['status' => Status::PUBLISHED]);

        $redirect = route('sections.index') . DIRECTORY_SEPARATOR . $resource . DIRECTORY_SEPARATOR . $id_resource;
        return response(['redirect' => $redirect]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $resource, int $id_resource, int $id_section)
    {
        $section = Sections::findOrFail($id_section);

        if ($section->delete()) {
            if (
                $section->extra_resource == ResourceTypes::BUILDER
                && $section->status == Status::PUBLISHED
                && Storage::disk('public')->exists('store_builder/' . $id_section . '.html')
                && Storage::disk('public')->exists('store_builder_clean/' . $id_section . '.html')
            ) {
                Storage::disk('public')->delete('store_builder/' . $id_section . '.html');
                Storage::disk('public')->delete('store_builder_clean/' . $id_section . '.html');
            }

            return response(['notification' => NotificationMsg::SECTIONS[Code::DELETE]]);
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
                    Sections::findOrFail($val)->update(['num' => $key, 'timestamps' => false]);
                } else {
                    return response(['error'], 401);
                }
            }
            return response(['notification' => NotificationMsg::SECTIONS[Code::SORTING]]);
        }
    }
}
