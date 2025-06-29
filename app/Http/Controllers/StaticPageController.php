<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class StaticPageController extends Controller
{
    public function index()
    {
        $path = public_path('static-html/index.html');

        if (!File::exists($path)) {
            abort(404, "File not found");
        }

        return response()->file($path);
    }
}