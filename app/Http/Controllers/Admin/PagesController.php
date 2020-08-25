<?php

namespace App\Http\Controllers\Admin;

use App\Constants\{
    NotificationCode as Code, NotificationMsg, ResourceTypes
};
use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;
use Illuminate\Validation\Rule;

use App\Libs\Package;

use App\Model\Pages;
use App\Model\Admin\Seo;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.pages.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PagesRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(PagesRequest $request)
    {
        $request->validate([
            'name' => [
                Rule::unique('pages')
            ],
            'url' => [
                Rule::unique('pages')
            ],
        ],
            [
                'name.unique' => 'Такая страница уже существует. ',
                'url.unique' => 'Такой адрес уже существует. ']
        );
        $page = new Pages();
        $page->url = $request->url;
        $page->name = $request->name;
        if ($page->save()) {
            $page->seo()->create(['resource' => ResourceTypes::PAGES, 'id_resource' => $page->id, 'meta' => json_encode([])]);
            return response(['notification' => NotificationMsg::PAGES[Code::STORE]]);
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
            'data' => Pages::all()->toArray()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PagesRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagesRequest $request, int $id)
    {
        $request->validate([
            'name' => [
                Rule::unique('pages')->ignore($id),
            ],
            'url' => [
                Rule::unique('pages')->ignore($id),
            ],
        ],
            [
                'name.unique' => 'Такая страница уже существует. ',
                'url.unique' => 'Такой адрес уже существует. ']
        );

        $page = Pages::findOrFail($id);
        $page->name = $request->name;
        $page->url = $request->url;
        if ($page->update()) {
            return response(['notification' => NotificationMsg::PAGES[Code::UPDATE]]);
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
        $page = Pages::findOrFail($id);
        $page->seo()->delete();
        if ($page->delete()) {
            return response(['notification' => NotificationMsg::PAGES[Code::DELETE]]);
        }
        return response(['error'], 401);
    }

    /**
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function generateAllPages()
    {
        if (Package::combine()) {
            $modify = uniqid();
            foreach (Pages::all()->toArray() as $page) {
                Package::page($page['id'], $modify);
            }
            return response(['notification' => NotificationMsg::PAGES[Code::GENERATE]]);
        }
    }
}
