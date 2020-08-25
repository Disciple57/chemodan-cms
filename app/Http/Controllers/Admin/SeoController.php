<?php

namespace App\Http\Controllers\Admin;

use App\Constants\{
    ResourceTypes, NotificationCode as Code, NotificationMsg
};
use App\Http\Controllers\Controller;
use App\Model\Pages;
use App\Model\Admin\Seo;
use App\Model\Admin\Images;
use App\Http\Resources\Admin\Seo as SeoResource;
use App\Http\Resources\Admin\Images as Imgs;
use Illuminate\Http\Request;
use App\Http\Requests\SeoRequest;
use Illuminate\Support\Facades\Storage;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($resource)
    {
        if (in_array($resource, [ResourceTypes::PAGES])) {
            return view('admin.seo.index');
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param $resource
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function show($resource)
    {
        if (!in_array($resource, [ResourceTypes::PAGES])) {
            return response(['error' => 'Ресурс не существует'], 400);
        }
        return response([
            'data' => SeoResource::collection(Seo::all()->where('resource', $resource)),
            'images' => Imgs::collection(Images::all())
        ]);
    }


    /** og:title og:description og:type og:url og:image
     * Update the specified resource in storage.
     *
     * @param SeoRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeoRequest $request, $resource, $id)
    {
        $meta['title'] = $request->title;
        $meta['description'] = $request->description;

        // Open Graph
        if ($request->og_title) {
            $meta['og_title'] = $request->og_title;
        }
        if ($request->og_description) {
            $meta['og_description'] = $request->og_description;
        }
        if ($request->og_image) {
            $meta['og_image'] = $request->og_image;
        }

        // Extra tags
        if ($request->extra) {
            $meta['extra'] = $request->extra;
        }
        $meta = json_encode($meta);

        if (Seo::find($id)->update(['meta' => $meta])) {
            return response(['notification' => NotificationMsg::SEO[Code::UPDATE]]);
        }
        return response(['error'], 401);
    }
}
