@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/review_list.css') }}" />
@endsection
@section('content')
<div class="list__content--heading">
    @if(!$reviews)
    <dev class="message">
        <p>まだレビューはありません</p>
    </dev>
    @else
    <div class="title">
        <p>レビュー一覧</p>
    </div>
</div>
<div class="list__content">
    <div class="list__content--inner">
        @foreach($reviews as $review)
        <div class="shop-card">
            <h2 class="shop-name">
                <p>{{ $review->shop->shop_name }}</p>
            </h2>
            <div class="shop__img">
                <img src="{{ Storage::url($review->shop->shop_image_path) }}" alt="">
            </div>
        </div>
        <div class="review-card">
            <div class="review-card__group">
                <div class="review-card__item">
                    <span class="card__tag">お名前</span>
                    <p class="user-name">{{ $review->user->name }}さん</p>
                </div>
            </div>
            <div class="review-card__group">
                <div class="review-card__item">
                    <span class="card__tag">評価</span>
                    <p class="rating">{{ $review->rating }}</p>
                </div>
            </div>
            <div class="review-card__group">
                <div class="review-card__item">
                    <span class="card__tag">コメント</span>
                    <p class="comment">{{ $review->comment }}</p>
                </div>
            </div>
            <div class="review-card__group">
                <div class="review-card__item">
                    <span class="card__tag">投稿日</span>
                    <p class="posted-date">{{ ($review->created_at)->format('Y-m-d') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
<div class="home__link">
    <a class="home__link--button" href="/">戻る</a>
</div>
@endsection