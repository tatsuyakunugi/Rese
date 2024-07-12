@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection
@section('content')
<div class="thanks__content">
    <div class="thanks-card">
        <div class="thanks-card__content">
            <div class="thanks-card__body">
                @if(Session::has('error'))
                <div class="thanks-card__error">
                    <p>{{ session('error') }}</p>
                </div>
                @else(Session::has('message'))
                <div class="thanks-card__sucsess">
                    <p>{{ session('message') }}</p>
                </div>
                <div class="link">
                    <a class="login__link" href="/login">ログインする</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection