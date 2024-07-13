@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/done.css') }}" />
@endsection
@section('content')
<div class="main__content">
    <div class="completion-card">
        <div class="completion-card__content">
            <div class="session__message">
                @if(Session::has('message'))
                <p class="completion-card__message">{{ session('message') }}</p>
                @endif
            </div>
            <div class="link">
                <a class="return__link" href="/">戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection