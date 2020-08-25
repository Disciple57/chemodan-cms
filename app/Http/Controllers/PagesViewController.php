<?php

namespace App\Http\Controllers;

use App\Constants\StorageDirectory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Model\Pages;

class PagesViewController extends Controller
{

    public function show($page) {

        $view = 'pages.' . $page->id;
        abort_unless(view::exists($view), 404);

        return view($view);
    }

    public function sitemap() {
        return response(view('sitemap', ['pages' => Pages::all()->toArray()]), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
