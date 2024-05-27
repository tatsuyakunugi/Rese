<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/menu">Rese</a>
        </div>
    </header>
    <main class="main">
        <div class="register__content">
            <form class="register-form" action="/register" method="post">
                @csrf
                <div class="register-form__heading">
                    <p>Registration</p>
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label--item">Username</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="name">
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
                    <div class="form__group-title">
                        <span class="form__label--item">Email</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="email" name="email">
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
                    <div class="form__group-title">
                        <span class="form__label--item">Password</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="password" name="password">
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
            </form>
        </div>
    </main>
</body>
</html>