<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function store($shopId)
    {
        $user = Auth::user();
        if(!$user->is_like($shopId))
        {
            $user->like_shops()->attach($shopId);
        }
        return back();
    }

    public function destroy($shopId)
    {
        $user = Auth::user();
        if($user->is_like($shopId))
        {
            $user->like_shops()->detach($shopId);
        }
        return back();
    }
}
