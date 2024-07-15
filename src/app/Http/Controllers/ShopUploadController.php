<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopUploadController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $shop_image = $request->file('shop_image');
        $shop_image_path = $shop_image->store('public/shop_images');

        $shop = new Shop();
        $shop->shop_name = $request->input('shop_name');
        $shop->area_id = $request->input('area_id');
        $shop->genre_id = $request->input('genre_id');
        $shop->content = $request->input('content');
        $shop->shop_image_path = $shop_image_path;
        $shop->save();

        return redirect('create');
    }
}
