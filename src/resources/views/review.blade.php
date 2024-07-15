@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}" />
@endsection
@section('content')
<div class="review__content">
    <div class="review__content--inner">
        <div class="reservation-info">
            <div class="shop__img">
                <img src="{{ Storage::url($reservation->shop->shop_image_path) }}" alt="">
            </div>
            <div class="reservation__status--group">
                <div class="reservation__status-tag">
                    <span>ご利用店舗</span>
                </div>
                <div class="shop-name">    
                    <p>{{ $reservation->shop->shop_name }}</p>
                </div>
            </div>
            <div class="reservation__status--group">
                <div class="reservation__status-tag">
                    <span>ご利用日</span>
                </div>
                <div class="reservation-date">    
                    <p>{{ $reservation->reservation_date}}</p>
                </div>
            </div>
        </div>
        <div class="review-card">
            <div class="review-card__heading">
                <div class="comment">
                    <p>この度はご来店ありがとうございました。</p>
                    <p>よろしければアンケートにご協力ください。</p>
                </div>
            </div>
            <form class="review-form" action="{{ route('reviews.store') }}" method="post">
            @csrf
                <div class="form__group">
                    <div class="select__rating">
                        <input id="star5" type="radio" name="rating" value="5">
                        <label for="star5">★5</label>
                        <input id="star4" type="radio" name="rating" value="4">
                        <label for="star4">★4</label>
                        <input id="star3" type="radio" name="rating" value="3">
                        <label for="star3">★3</label>
                        <input id="star2" type="radio" name="rating" value="2">
                        <label for="star2">★2</label>
                        <input id="star1" type="radio" name="rating" value="1">
                        <label for="star1">★1</label>
                    </div>
                    <div class="form__error">
                        @error('rating')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="input__comment">
                        <textarea name="comment"></textarea>
                    </div>
                    <div class="form__error">
                        @error('comment')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="review-form__button">
                    <input type="hidden" name="shop_id" value="{{ $reservation->shop->id }}">
                    <button class="review-form__button-submit" type="submit">レビューを投稿する</button>
                </div>
                <div class="alert">
                    @if(session('error'))
                    {{ session('error') }}
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection