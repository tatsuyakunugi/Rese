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
            <a class="review__link" href="/review_list/{{ $shop->id }}">このお店のレビューをを見る</a>
        </div>
    </div>
    <livewire:reservation :shop="$shop">
</div>  
@endsection