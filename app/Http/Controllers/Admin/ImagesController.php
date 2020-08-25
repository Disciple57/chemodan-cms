<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImagesRequest;
use App\Http\Resources\Admin\Images as Imgs;
use App\Constants\{
    Mime, StorageDirectory, NotificationCode as Code, NotificationMsg
};
use App\Libs\Image;
use App\Model\Admin\Images;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.images.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ImagesRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(ImagesRequest $request)
    {
        $user_file = $request->file('image');
        $mime = $user_file->getClientOriginalExtension();
        $size = $user_file->getSize();

        $uniqid = uniqid();

        $image = new Images();
        $image->mime = $mime;
        $image->size = $size;
        $image->name = $uniqid;
        $image->info = Image::info($user_file);
        $image->num = $image->id;

        $patch = StorageDirectory::IMAGES . DIRECTORY_SEPARATOR;

        $user_file->storeAs($patch, $uniqid . '.' . $mime);

        if ($image->save() && $image->update(['num' => $image->id])) {
            return response(['notification' => NotificationMsg::IMAGES[Code::STORE]]);
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
            'data' => Imgs::collection(Images::all()),
            'mimes' => Mime::IMAGES,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ImagesRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(ImagesRequest $request, int $id)
    {
        $user_file = $request->file('image');
        $mime = $user_file->getClientOriginalExtension();
        $size = $user_file->getSize();

        $image = Images::findOrFail($id);
        $image->mime = $mime;
        $image->size = $size;
        $image->info = Image::info($user_file);

        $patch = StorageDirectory::IMAGES . DIRECTORY_SEPARATOR;

        $user_file->storeAs($patch, $image->name . '.' . $mime);

        if ($image->update()) {
            return response(['notification' => NotificationMsg::IMAGES[Code::UPDATE]]);
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
        $image = Images::findOrFail($id);
        $file = StorageDirectory::IMAGES . DIRECTORY_SEPARATOR . $image->name . '.' . $image->mime;
        if ($image->delete() && Storage::exists($file)) {
            Storage::delete($file);
            return response(['notification' => NotificationMsg::IMAGES[Code::DELETE]]);
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
                    Images::findOrFail($val)->update(['num' => $key, 'timestamps' => false]);
                } else {
                    return response(['error'], 401);
                }
            }
            return response(['notification' => NotificationMsg::IMAGES[Code::SORTING]]);
        }
    }
}
