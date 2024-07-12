@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/registered.css') }}" />
@endsection
@section('content')   
<div class="registered__content">
    <div class="registered-card">
        <div class="registered-card__content">
            <div class="registered-card__header">
                仮会員登録完了
            </div>
            <div class="registered-card__body">
                <p>
                    この度は、ご登録いただき、誠にありがとうございます。
                </p>
                <p>
                    ご本人様確認のため、ご登録いただいたメールアドレスに、<br>
                    本登録のご案内のメールが届きます。
                </p>
                <p>
                    そちらに記載されているURLにアクセスし、<br>
                    アカウントの本登録を完了させてください。
                </p>
            </div>
        </div>
    </div>
</div>
@endsection