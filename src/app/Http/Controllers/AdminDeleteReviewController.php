<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Review;

class AdminDeleteReviewController extends Controller
{
    public function getReviewDetail($id)
    {
        $user = User::find($id);
        $reviews = '';

        if(Review::where('user_id', $user->id)->exists())
        {
            $reviews = Review::where('user_id', $user->id)->get();
        }else{
            $reviews = null;
        }

        return view('admin.review_detail', compact('user', 'reviews'));
    }

    public function destroy(Request $request, $id)
    {
        $review = Review::find($id);
        $user_id = $review->user_id;
        $review->delete();

        return redirect()->route('admin.showReviewDetail', ['user_id' => $user_id]);
    }
}
