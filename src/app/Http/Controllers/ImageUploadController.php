<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illminate\Support\Str;

class ImageUploadController extends Controller
{
    public function image()
    {
        return view('image');
    }

    public function store(Request $request)
    {
        $shop_image = $request->file('shop_image');
        $shop_image_path = $shop_image->store('public/shop_images');

        return redirect('image')->with('message', 'アップロードに成功しました。');
    }
}
