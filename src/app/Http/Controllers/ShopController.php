<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Review;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

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
            $items->where('shop_name', 'like', '%' . $keyword . '%')->get();    
        }

        $shops = $items->get();
        
        return view('index', compact('shops', 'areas', 'genres', 'keyword'));
    }

    public function sort(Request $request)
    {
        $sort_id = $request->input('sort_id');

        $areas = Area::all();
        $genres = Genre::all();
        $keyword = null;

        
        if ($sort_id === '1')
        {
            $shops = Shop::inRandomOrder()->get();
        } elseif ($sort_id === '2') {
            $query = Shop::query();
            $shops = $query->leftjoin('reviews', 'shops.id', '=', 'reviews.shop_id')
                           ->select('shops.*')
                           ->selectRaw('avg(reviews.rating) as avg_rating')
                           ->groupBy('shops.id')
                           ->orderByDesc('avg_rating')
                           ->get();
        } elseif ($sort_id === '3') {
            $query = Shop::query();
            $shops = $query->leftjoin('reviews', 'shops.id', '=', 'reviews.shop_id')
                           ->select('shops.*')
                           ->selectRaw('avg(reviews.rating) as avg_rating')
                           ->groupBy('shops.id')
                           ->orderBy('avg_rating')
                           ->get();
        } else {
            $shops = Shop::all();
        }

        return view('index', compact('shops', 'areas', 'genres', 'keyword'));
    }

    public function detail($id)
    {
        $shop = Shop::find($id);
        $user = '';
        $review = '';
        $reservation = '';

        if(Auth::user()){
            $user = Auth::user();
            if(Review::where('user_id', $user->id)->where('shop_id', $shop->id)->exists())
        {
            $review = Review::where('user_id', $user->id)->where('shop_id', $shop->id)->first();
        }else{
            $review = null;
        }

        if(Reservation::where('user_id', $user->id)->where('shop_id', $shop->id)->exists())
        {
            $reservation = Reservation::where('user_id', $user->id)->where('shop_id', $shop->id)->first();
        }else{
            $reservation = null;
        }
        
        return view('detail', compact('user', 'shop', 'review', 'reservation'));

        }else{

            return view('detail', compact('user', 'shop', 'review', 'reservation'));

        }    
    }
}
