<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $area_id = $request->input('area_id');
        $genre_id = $request->input('genre_id');
        $keyword = $request->input('keyword');

        $areas = Area::all();
        $genres = Genre::all();

        $items = Shop::query();

        if(!empty($area_id))
        {
            $items->whereHas('area', function ($query) use ($area_id) {
                $query->where('id', $area_id);
            })->get();
        }

        if(!empty($genre_id))
        {
            $items->whereHas('genre', function ($query) use ($genre_id) {
                $query->where('id', $genre_id);
            })->get();
        }

        if(!empty($keyword))
        {
            $items->where('shop_name', 'like', '%' . $keyword . '%')
            ->orwhereHas('area', function ($query) use ($keyword) {
                $query->where('area_name', 'like', '%' . $keyword . '%');
            })
            ->orwhereHas('genre', function ($query) use ($keyword) {
                $query->where('genre_name', 'like', '%' . $keyword . '%');
            })->get();    
        }

        $shops = $items->get();
        $user = '';
        $existingLike = '';

        if(Auth::user())
        {
            $user = Auth::user();
        }else{
            $user = null;
        }

        if($user)
        {
            $user_id = Auth::id();

            foreach($shops as $shop)
            {
                if(Like::where('user_id', $user_id)->where('shop_id', $shop->id)->exists())
                {
                    $existingLike = Like::where('user_id', $user_id)->where('shop_id', $shop->id)->first();
                }
            }
        }

        return view('index', compact('shops', 'areas', 'genres', 'keyword', 'existingLike'));
    }

    public function store(Request $request){
        // 認証済みユーザーを取得
        $user = Auth::user();
        $shop = Shop::find($request->shop_id);

        if ($user) {
            // Userのid取得
            $user_id = Auth::id();

            // 既にいいねしているかチェック
            $existingLike = Like::where('shop_id', $shop->id)
                ->where('user_id', $user_id)
                ->first();

            // 既にいいねしている場合は何もせず、そうでない場合は新しいいいねを作成する
            if (!$existingLike) {
                $like = new Like();
                $like->user_id = $user_id;
                $like->shop_id = $shop->id;
                $like->save();
            }
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::find($request->shop_id);
        $like = Like::where('user_id', $user->id)->where('shop_id', $shop->id)->first();

        $like->delete();
        
        return back();
    }

    public function detail()
    {
        return view('detail');
    }
}
