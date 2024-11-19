@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/csv.css') }}">
@endsection

@section('content')
<div class="csv-page__content">
    <div class="csv-page__heading">
        <div class="csv-page__heading--item">
            <a class="top-page__link" href="/admin">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </div>
        <div class="csv-page__heading--item">
            <p>店舗新規登録</p>
        </div>
    </div>
    <div class="csv-page__body">
        <form class="csv-form" action="{{ route('csv.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form__input--image">
                <label class="image-upload" for="shop_image">店舗画像選択</label>
                <input type="file" name="shop_image" id="shop_image">
            </div>
            <div class="form__input--csv">
                <label class="csv-upload" for="csv_file">アップロードファイル選択</label>
                <input type="file" name="csv_file" id="csv_file">                
            </div>
            <p class="message">{{ $message }}</p>
            <button class="form__button-submit">アップロードする</button>
        </form>
        @if($errors->all())
        <div class="form__error">
            <p class="form__error--heading">※入力に誤りがあります</p>
            @foreach($errors->all() as $error)
            <p class="error">{{ $error }}</p>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endsection