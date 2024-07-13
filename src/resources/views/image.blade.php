@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/image.css') }}" />
@endsection
@section('content')
<div class="image__content">
    <form class="image-form" action="{{ route('image_upload') }}" method="post" class="create-form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="shop_image" class="input_label">画像</label>
            <input type="file" class="input_form" name="shop_image">
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">登録</button>
        </div>
    </form>
    <div class="image__alert">
        <div class="image__alert--success">
            {{ session('message') }}
        </div>
    </div>
</div>
@endsection