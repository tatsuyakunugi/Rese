@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/review.css') }}" />
@endsection
@section('content')
<div class="review__content">
    <div class="review__content--inner">
        <div class="shop-card">
            <div class="shop-card__img">
                <img src="{{ Storage::url($shop->shop_image_path) }}" alt="">
            </div>
            <div class="shop-card__content">
                <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                <div class="shop-card__content-tag">
                    <p class="shop-area">#{{ $shop->area->area_name }}</p>
                    <p class="shop-genre">#{{ $shop->genre->genre_name }}</p>
                </div>
                <div class="shop-card__items">
                    <div class="detail__link-button">
                        <a class="detail__link" href="/detail/{{ $shop->id }}">詳しく見る</a>
                    </div>
                </div>
            </div>
        </div>
        @if(is_null($review))
        <div class="review-card">
            <form class="review-form" action="{{ route('reviews.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form__group">
                    <div class="form__group--title">
                        <p>体験を評価してください</p>
                    </div>
                    <div class="select__rating">
                        <input id="star5" type="radio" name="rating" value="5">
                        <label for="star5">★</label>
                        <input id="star4" type="radio" name="rating" value="4">
                        <label for="star4">★</label>
                        <input id="star3" type="radio" name="rating" value="3">
                        <label for="star3">★</label>
                        <input id="star2" type="radio" name="rating" value="2">
                        <label for="star2">★</label>
                        <input id="star1" type="radio" name="rating" value="1">
                        <label for="star1">★</label>
                    </div>
                    <div class="form__error">
                        @error('rating')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group--title">
                        <p>口コミを投稿</p>
                    </div>
                    <div class="input__comment">
                        <textarea name="comment"></textarea>
                    </div>
                    <div class="form__error">
                        @error('comment')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group--title">
                        <p>画像の追加</p>
                    </div>
                    <div class="form__input--image">
                        <label class="image-upload" for="image">クリックして写真を追加、またはドラッグアンドドロップ</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="form__error">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="review-form__button">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <button class="review-form__button-submit" type="submit">口コミを投稿する</button>
                </div>
            </form>
        </div>
        @else
        <div class="review-card">
            <form class="review-form" action="{{ route('reviews.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form__group">
                    <div class="form__group--title">
                        <p>体験を評価してください</p>
                    </div>
                    <div class="select__rating">
                        <input id="star5" type="radio" name="rating" value="5">
                        <label for="star5">★</label>
                        <input id="star4" type="radio" name="rating" value="4">
                        <label for="star4">★</label>
                        <input id="star3" type="radio" name="rating" value="3">
                        <label for="star3">★</label>
                        <input id="star2" type="radio" name="rating" value="2">
                        <label for="star2">★</label>
                        <input id="star1" type="radio" name="rating" value="1">
                        <label for="star1">★</label>
                    </div>
                    <div class="form__error">
                        @error('rating')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group--title">
                        <p>口コミを投稿</p>
                    </div>
                    <div class="input__comment">
                        <textarea name="comment"></textarea>
                    </div>
                    <div class="form__error">
                        @error('comment')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <div class="form__group--title">
                        <p>画像の追加</p>
                    </div>
                    <div class="form__input--image">
                        <label class="image-upload" for="image">クリックして写真を追加、またはドラッグアンドドロップ</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="form__error">
                        @error('image')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="review-form__button">
                    <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                    <button class="review-form__button-submit" type="submit">口コミを編集する</button>
                </div>
            </form>
        </div>
        @endif
    </div>
    </div>
</div>
@endsection