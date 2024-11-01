@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/review_detail.css') }}">
@endsection

@section('content')
<div class="detail-page__content">
    <div class="detail-page__heading">
        <a class="list-page__link" href="/admin/user_list">
            <i class="fa-solid fa-chevron-left"></i>
        </a>
        <p>{{ $user->name }}さんの口コミ詳細</p>
    </div>
    @if(is_null($reviews))
    <div class="message">
        <p>投稿された口コミはありません</p>
    </div>
    @else
    @foreach($reviews as $review)
    <div class="detail-card">
        <div class="detail-card__inner">
            <div class="detail-card__group">
                <div class="detail-card__title">
                    <p class="detail-card__tag">名前：</p>
                </div>
                <div class="detail-card__item">
                    {{ $review->user->name }}
                </div>
            </div>
            <div class="detail-card__group">
                <div class="detail-card__title">
                    <p class="detail-card__tag">店舗名：</p>
                </div>
                <div class="detail-card__item">
                    {{ $review->shop->name }}
                </div>
            </div>
            <div class="detail-card__group">
                <div class="detail-card__title">
                    <p class="detail-card__tag">投稿日：</p>
                </div>
                <div class="detail-card__item">
                    {{ $review->created_at->format('Y-m-d H:i') }}
                </div>
            </div>
            <div class="detail-card__group">
                <div class="detail-card__title">
                    <p class="detail-card__tag">投稿内容：</p>
                </div>
                <div class="detail-card__item">
                    {{ $review->review }}
                </div>
            </div>
            <div class="delete-form__button">
                <form class="delete-form" action="{{ route('admin.reviewDestroy' ,$review->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="delete-form__button-submit" type="submit">この口コミを削除する</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endif               
</div>
@endsection