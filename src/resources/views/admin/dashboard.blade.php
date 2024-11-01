@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')
<div class="top-page__content">
    <div class="top-page__heading">
        <p>管理ページTOP</p>
    </div>
    <div class="top-page__body">
        <div class="link-form">
            <div class="user-list__link">
                <a class="link-form__button" href="/admin/user_list">
                    ユーザー一覧
                </a>
            </div>
        </div>
    </div>
</div>
@endsection