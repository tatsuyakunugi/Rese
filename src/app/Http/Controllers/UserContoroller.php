<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reservation;
use Carbon\Carbon;

class UserContoroller extends Controller
{
    public function menu()
    {
        return view('menu');
    }

    public function mypage()
    {
        $user = Auth::user();
        $shops = '';
        $reservations = '';
        
        if(Like::where('user_id', $user->id)->exists())
        {
            $shops = $user->like_shops()->get();
        }

        if(Reservation::where('user_id', $user->id)->exists())
        {
            $reservations = Reservation::where('user_id', $user->id)->get();
        }
        
        return view('mypage', compact('user', 'shops', 'reservations'));
    }
}
