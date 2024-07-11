<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reservation;
use App\Models\Review;
use App\Http\Requests\ReviewRequest;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $this->validate($request,[
            'rating' => 'required',
            'comment' => 'required',
        ]);
        
        $now = Carbon::now();
        $user = Auth::user();
        $shop = Shop::find($request->input('shop_id'));
        $reservation = Reservation::where('user_id', $user->id)->where('shop_id', $shop->id)->first();
        $reservationDateTime = Carbon::createFromTimeString($reservation->reservation_datetime);
        $review = '';

        if(Review::where('user_id', $user->id)->where('shop_id', $shop->id)->exists())
        {
            return back()->with('error', '※すでにこのお店のレビューは投稿しています');
        }

        if($reservationDateTime->isPast())
        {
            $review = new Review([
                'user_id' => $user->id,
                'shop_id' => $shop->id,
                'rating' => $request->input('rating'),
                'comment' => $request->input('comment'),
            ]);
    
            //保存
            $review->save();
            
            Session::put('message', 'ご協力ありがとうございました。');
            return view('review');
        }else{
            return back()->with('error', '※レビュー投稿は予約日時以降から可能となります。');
        }
    }

    public function showList($id)
    {
        $reviews = '';

        if(Review::where('shop_id', $id)->exists())
        {
            $reviews = Review::where('shop_id', $id)->get();
        }

        return view('review_list', compact('reviews'));
    }
}
