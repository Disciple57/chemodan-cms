<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BgImagesRequest;
use App\Libs\Package;
use App\Constants\{
    StorageDirectory, NotificationCode as Code, NotificationMsg
};
use App\Model\Admin\{
    Images, Bgimages
};
use App\Http\Resources\Admin\Bgimages as BgimagesResource;
use App\Http\Resources\Admin\Images as ImagesResource;

class BgImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bg_images.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BgImagesRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(BgImagesRequest $request)
    {
        $bg_image = new Bgimages();
        $bg_image->id_image = $request->id_image;
        $bg_image->options = $this->getOptions($request);

        if ($bg_image->save() && $bg_image->update(['num' => $bg_image->id]) && Package::bgImages()) {
            return response(['notification' => NotificationMsg::BG_IMAGES[Code::STORE]]);
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
            'data' => BgimagesResource::collection(Bgimages::all()),
            'images' => ImagesResource::collection(Images::all())
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BgImagesRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(BgImagesRequest $request, int $id)
    {
        $bg_image = Bgimages::findOrFail($id);
        $bg_image->id_image = $request->id_image;
        $bg_image->options = $this->getOptions($request);

        if ($bg_image->update() && Package::bgImages()) {
            return response(['notification' => NotificationMsg::BG_IMAGES[Code::UPDATE]]);
        }
        return response(['error'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $bg_image = Bgimages::findOrFail($id);
        if ($bg_image->delete() && Package::bgImages()) {
            return response(['notification' => NotificationMsg::BG_IMAGES[Code::DELETE]]);
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
                    Bgimages::findOrFail($val)->update(['num' => $key, 'timestamps' => false]);
                } else {
                    return response(['error'], 401);
                }
            }
            return response(['notification' => NotificationMsg::BG_IMAGES[Code::SORTING]]);
        }
    }

    /**
     * @param $request
     * @return string
     */
    private function getOptions($request) {
        $options = [
            'repeat' => $request->boolean('repeat'),
            'size' => $request->filled('size') ? $request->size : false,
            'unit' => $request->filled('unit') ? $request->unit : false,
            'background_size' => $request->filled('background_size') ? $request->background_size : false,
            'position_x' => $request->filled('position_x') ? $request->position_x : false,
            'position_y' => $request->filled('position_y') ? $request->position_y : false
        ];
        return json_encode($options);
    }
}
