<?php

namespace App\Http\Controllers\Admin;

use App\Constants\{
    NotificationCode as Code, NotificationMsg
};
use App\Http\Controllers\Controller;
use App\Model\Admin\Sliders;
use App\Http\Resources\Admin\Sliders as SliderResource;
use App\Http\Requests\SlidersRequest;
use Illuminate\Validation\Rule;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.sliders.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\SlidersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlidersRequest $request)
    {
        $request->validate(
            ['name' => [Rule::unique('sliders', 'name')]],
            ['name.unique' => 'Такой слайдер уже существует. ']
        );
        $slider = new Sliders();
        $slider->name = $request->name;

        $slider->settings = $this->getSettingsSlider($request);
        if ($slider->save()) {
            return response(['notification' => NotificationMsg::SLIDERS[Code::STORE]]);
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
        return response(['data' => SliderResource::collection(Sliders::all())]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SlidersRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlidersRequest $request, $id)
    {
        $request->validate(
            ['name' => [Rule::unique('sliders', 'name')->ignore($id)]],
            ['name.unique' => 'Такой слайдер уже существует. ']
        );
        $slider = Sliders::findOrFail($id);
        $slider->name = $request->name;

        $slider->settings = $this->getSettingsSlider($request);
        if ($slider->update()) {
            return response(['notification' => NotificationMsg::SLIDERS[Code::UPDATE]]);
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
        if (Sliders::destroy($id)) {
            return response(['notification' => NotificationMsg::SLIDERS[Code::DELETE]]);
        }
        return response(['error'], 401);
    }

    /**
     * @param $request
     * @return string
     */
    private function getSettingsSlider($request) {
        $settings = [];

        if ($request->height) {
            $settings['height'] = $request->height;
        }
        if ($request->pause) {
            $settings['pause'] = $request->pause;
        }
        if ($request->speed) {
            $settings['speed'] = $request->speed;
        }
        if ($request->mode) {
            $settings['mode'] = $request->mode;
        }
        $settings['controls'] = $request->controls ? true : false;
        $settings['pager'] = $request->pager ? true : false;
        $settings['auto'] = $request->auto ? true : false;
        $settings['adaptiveHeight'] = $request->adaptiveHeight ? true : false;

        $settings['touchEnabled'] = $request->touchEnabled ? true : false;
        $settings['oneToOneTouch'] = $request->oneToOneTouch ? true : false;
        $settings['preventDefaultSwipeX'] = $request->preventDefaultSwipeX ? true : false;
        $settings['preventDefaultSwipeY'] = $request->preventDefaultSwipeY ? true : false;

        return json_encode($settings);
    }
}
