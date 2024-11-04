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
use App\Models\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function review($id)
    {
        $user = Auth::user();
        $shop = shop::find($id);
        $review = '';

        if(Review::where('user_id', $user->id)->where('shop_id', $shop->id)->exists())
        {
            $review = Review::where('user_id', $user->id)->where('shop_id', $shop->id)->get();
        }else{
            $review = null;
        }

        return view('review', compact('shop', 'review'));
    }

    public function store(ReviewRequest $request)
    {
        $this->validate($request,[
            'rating' => 'required',
            'comment' => 'required|max:400',
            'image' => 'nullable|file|mimes:jpeg,png',
        ]);

        $user = Auth::user();
        $shop = Shop::find($request->input('shop_id'));
        $image_path = '';
        $review = '';

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_path = $image->store('public/images');
        }else{
            $image_path = null;
        }

        if(Review::where('user_id', $user->id)->where('shop_id', $shop->id)->exists())
        {
            return back();
        }

        $review = new Review([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'image_path' => $image_path,
        ]);

        $review->save();
            
        Session::put('message', 'ご協力ありがとうございました。');
        return view('completion');
    }

    public function update(ReviewRequest $request)
    {
        $this->validate($request,[
            'rating' => 'required',
            'comment' => 'required|max:400',
            'image' => 'nullable|file|mimes:jpeg,png',
        ]);

        $user = Auth::user();
        $shop = Shop::find($request->input('shop_id'));
        $review = Review::where('user_id', $user->id)->where('shop_id', $shop->id)->first();
        $image_path = '';

        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $image_path = $image->store('public/images');
        }else{
            $image_path = null;
        }

        $review->update([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'image_path' => $image_path,
        ]);

        Session::put('message', '投稿内容を更新しました。');
        return view('completion');

    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::find($request->input('shop_id'));
        $review = Review::where('user_id', $user->id)->where('shop_id', $shop->id)->first();
        
        $review->delete();

        Session::put('message', '投稿を削除しました。');
        return view('completion');
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
