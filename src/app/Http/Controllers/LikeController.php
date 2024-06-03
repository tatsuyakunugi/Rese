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

class LikeController extends Controller
{
    public function store($shopId)
    {
        //is_like()メソッドを使って、すでにお気に入り登録しているかを確認した後、お気に入り登録をする(重複させない)
        $user = Auth::user();
        if(!$user->is_like($shopId))
        {
            $user->like_shops()->attach($shopId);
        }
        return back();
    }

    public function destroy($shopId)
    {
        //is_like()メソッドを使ってすでに登録済みかを確認し、もししていたら登録を解除する
        $user = Auth::user();
        if($user->is_like($shopId))
        {
            $user->like_shops()->detach($shopId);
        }
        return back();
    }
}
