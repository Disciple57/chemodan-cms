<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ComponentsRequest;
use Illuminate\Support\Facades\Storage;
use App\Constants\{
    StorageDirectory, NotificationCode as Code, NotificationMsg
};
use Illuminate\Validation\Rule;
use App\Model\Admin\Components;

class ComponentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.components.index');
    }


    /**
     * @param ComponentsRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(ComponentsRequest $request)
    {
        $request->validate([
            'name' => [
                Rule::unique('components', 'name')
            ],
            'filename' => [
                Rule::unique('components', 'filename')
            ],
        ],
            [
                'name.unique' => 'Компонент с таким именем уже существует. ',
                'filename.unique' => 'Такое имя файла уже существует. ',
            ]
        );
        $component = new Components();
        $component->name = $request->name;
        $component->filename = $request->filename;
        $component->html = $request->html ? true : null;
        $component->css = $request->css ? true : null;
        $component->js = $request->js ? true : null;
        if ($component->save() && $component->update(['num' => $component->id])) {

            $patch = StorageDirectory::COMPONENTS . DIRECTORY_SEPARATOR . $request->filename . DIRECTORY_SEPARATOR . $request->filename;

            if ($request->html) {
                Storage::put($patch . '.html', $request->html);
            }
            if ($request->css) {
                Storage::put($patch . '.css', $request->css);
            }
            if ($request->js) {
                Storage::put($patch . '.js', $request->js);
            }

            return response(['notification' => NotificationMsg::COMPONENTS[Code::STORE]]);
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
        return response(['data' => Components::all()->toArray()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = Components::find($id)->toArray();
        $patch = StorageDirectory::COMPONENTS . DIRECTORY_SEPARATOR . $component['filename'] . DIRECTORY_SEPARATOR . $component['filename'];
        if ($component['html'] != null && Storage::exists($patch . '.html')) {
            $component['html'] = Storage::get($patch . '.html');
        }
        if ($component['css'] != null && Storage::exists($patch . '.css')) {
            $component['css'] = Storage::get($patch . '.css');
        }
        if ($component['js'] != null && Storage::exists($patch . '.js')) {
            $component['js'] = Storage::get($patch . '.js');
        }
        return response($component);
    }

    /**
     * @param ComponentsRequest $request
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(ComponentsRequest $request, $id)
    {
        $request->validate([
            'name' => [
                Rule::unique('components', 'name')->ignore($id)
            ],
            'filename' => [
                Rule::unique('components', 'filename')->ignore($id)
            ],
        ],
            [
                'name.unique' => 'Компонент с таким именем уже существует. ',
                'filename.unique' => 'Такое имя файла уже существует. ',
            ]
        );
        $component = Components::findOrFail($id);
        $component->name = $request->name;
        $component->html = $request->html ? true : null;
        $component->css = $request->css ? true : null;
        $component->js = $request->js ? true : null;
        if ($component->update()) {

            $patch = StorageDirectory::COMPONENTS . DIRECTORY_SEPARATOR . $component->filename . DIRECTORY_SEPARATOR . $component->filename;

            if ($request->html) {
                Storage::put($patch . '.html', $request->html);
            } else if (Storage::exists($patch . '.html')) {
                Storage::delete($patch . '.html');
            }

            if ($request->css) {
                Storage::put($patch . '.css', $request->css);
            } else if (Storage::exists($patch . '.css')) {
                Storage::delete($patch . '.css');
            }

            if ($request->js) {
                Storage::put($patch . '.js', $request->js);
            } else if (Storage::exists($patch . '.js')) {
                Storage::delete($patch . '.js');
            }

            return response(['notification' => NotificationMsg::COMPONENTS[Code::UPDATE]]);
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
        $component = Components::findOrFail($id);
        if ($component->delete()) {
            $patch = StorageDirectory::COMPONENTS . DIRECTORY_SEPARATOR . $component->filename;
            Storage::deleteDirectory($patch);
            return response(['notification' => NotificationMsg::COMPONENTS[Code::DELETE]]);
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
                    Components::findOrFail($val)->update(['num' => $key, 'timestamps' => false]);
                } else {
                    return response(['error'], 401);
                }
            }
            return response(['notification' => NotificationMsg::COMPONENTS[Code::SORTING]]);
        }
    }
}
