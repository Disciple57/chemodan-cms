<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use App\Constants\{
    StorageDirectory, NotificationCode as Code, NotificationMsg
};
use App\Libs\Package;
use App\Model\Admin\Colors;

class ColorsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.colors.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ColorRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        $colors = new Colors();
        $colors->color = $request->color;
        if ($colors->save() && $colors->update(['num' => $colors->id]) && Package::color()) {
            return response(['notification' => NotificationMsg::COLORS[Code::STORE]]);
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
        return response(['data' => Colors::all()->toArray()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ColorRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(ColorRequest $request, $id)
    {
        $color = Colors::findOrFail($id);
        $color->color = $request->color;
        if ($color->update() && Package::color()) {
            return response(['notification' => NotificationMsg::COLORS[Code::UPDATE]]);
        }

        return response(['error'], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Colors::findOrFail($id);
        if($color->delete() && Package::color()) {
            return response(['notification' => NotificationMsg::COLORS[Code::DELETE]]);
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
                    Colors::findOrFail($val)->update(['num' => $key, 'timestamps' => false]);
                } else {
                    return response(['error'], 401);
                }
            }
            return response(['notification' => NotificationMsg::COLORS[Code::SORTING]]);
        }
    }
}
