@extends('layouts.admin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user_list.css') }}">
@endsection

@section('content')
<div class="list-page__content">
    <div class="list-page__heading">
        <div class="list-page__heading--item">
            <a class="top-page__link" href="/admin">
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        </div>
        <div class="list-page__heading--item">
            <p>ユーザー一覧</p>
        </div>
    </div>
    <div class="list-table">
        <div class="list-table__alert">
            @if (session('message'))
            <div class="list-table__alert--success">{{ session('message') }}</div>
            @endif 
        </div>
        <table class="list-table__inner">
            <tbody>
                <tr class="list-table__title-row">
                    <th class="list-table__title">ID</th>
                    <th class="list-table__title">名前</th>
                    <th class="list-table__title">メールアドレス</th>
                    <th class="list-table__title">登録日</th>
                    <th class="list-table__title"></th>
                </tr>            
                @foreach($users as $user)
                <tr class="list-table__item-row">
                    <td class="list-table__item">{{ $user->id }}</td>
                    <td class="list-table__item">{{ $user->name }}</td>
                    <td class="list-table__item">{{ $user->email }}</td>
                    <td class="list-table__item">{{ $user->created_at->format('Y-m-d') }}</td>
                    <td class="list-table__item">
                        <a class="review_detail__link" href="{{ route('admin.showReviewDetail', $user->id) }}">口コミ一覧</a>
                    </td>                        
                </tr>
                @endforeach
            </tbody>
        </table> 
    </div>                
</div>
@endsection