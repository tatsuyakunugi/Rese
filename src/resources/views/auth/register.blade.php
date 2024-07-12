@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection
@section('content')
<div class="register__content">
    <div class="register__content-card">
        <form class="register-form" action="/register" method="post">
        @csrf
            <div class="register-form__heading">
                <p class="register-form__heading-title">Registration</p>
            </div>
            <div class="register-form__items">
                <div class="form__group">
                    <div class="form__group-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="form__group-item">
                        <div class="form__group-title">
                            <span class="form__label--item">Username</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="name">
                            </div>
                        </div>
                    </div>
                </div>
                @error('name')
                <div class="form__error">
                    <p class="form__error-message">
                        {{ $errors->first('name') }}
                    </p>
                </div>
                @enderror
                <div class="form__group">
                    <div class="form__group-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="form__group-item">
                        <div class="form__group-title">
                            <span class="form__label--item">Email</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="email" name="email">
                            </div>
                        </div>
                    </div>
                </div>
                @error('email')
                <div class="form__error">
                    <p class="form__error-message">
                        {{ $errors->first('email') }}
                    </p>
                </div>
                @enderror
                <div class="form__group">
                    <div class="form__group-icon">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="form__group-item">
                        <div class="form__group-title">
                            <span class="form__label--item">Password</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="password" name="password">
                            </div>
                        </div>
                    </div>
                </div>
                @error('password')
                <div class="form__error">
                    <p class="form__error-message">
                        {{ $errors->first('password') }}
                    </p>
                </div>
                @enderror
                <div class="form__button">
                    <button class="form__button-submit" type="submit">登録</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection