@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection
@section('content')
<div class="detail__content">
    <div class="shop-detail">
        <div class="shop-detail__header">
            <div class="link">
                @if(Auth::check())
                <a class="link__button" href="/mypage"><i class="fa-solid fa-less-than"></i></a>
                @endif
            </div>
            <div class="shop-name">
                <p>{{ $shop->shop_name }}</p>
            </div>
        </div>
        <div class="shop__img">
            <img src="{{ Storage::url($shop->shop_image_path) }}" alt="">
        </div>
        <div class="shop__tag">
            <p class="shop-area">#{{ $shop->area->area_name }}</p>
            <p class="shop-genre">#{{ $shop->genre->genre_name }}</p>
        </div>
        <div class="shop__content"> 
            <p>{{ $shop->content }}</p>
        </div>
        <div class="review__link-form">
            <a class="review-list__link" href="/review_list/{{ $shop->id }}">全ての口コミ情報</a>
        </div>
        @if(Auth::check())
        @if(is_null($review) && $reservation)
        <div class="reviwe__link">
            <a class="review__link-button" href="/review/{{ $shop->id }}">口コミを投稿する</a>
        </div>
        @elseif($review)
            @if(($user->id) == ($review->user_id))
            <div class="review-info">
                <div class="review-info__header">
                    <a class="review__update-button" href="/review/{{ $shop->id }}">口コミを編集</a>
                    <form class="review__delete-button" action="{{ route('reviews.destroy') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                        <button class="delete-button__submit" type="submit">口コミを削除</button>
                    </form>
                </div>
                <div class="review-info__body">
                    @switch($review->rating)
                        @case('1')
                            <p class="rating">★☆☆☆☆</p>
                            @break
                        @case('2')
                            <p class="rating">★★☆☆☆</p>
                            @break
                        @case('3')
                            <p class="rating">★★★☆☆</p>
                            @break
                        @case('4')
                            <p class="rating">★★★★☆</p>
                            @break
                        @case('5')
                            <p class="rating">★★★★★</p>
                            @break
                        @default
                    @endswitch
                    <p class="comment">{{ $review->comment }}</p>
                    <div class="img">
                        <img src="{{ Storage::url($review->image_path) }}" alt="">
                    </div>
                </div>
            </div>
            @endif
        @endif
        @endif
    </div>
    <livewire:reservation :shop="$shop">
</div>  
@endsection