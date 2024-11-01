<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/admin.login.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
</head>
<body>
<header class="header">
        <div class="header__inner">
            <h2 class="header__logo">Rese</h2>
        </div>
    </header>
    <main>
        <div class="login-form__content">
            <div class="login-form__heading">
                <p>Adminログインフォーム</p>
            </div>
            <form class="login-form" action="{{ url('admin/login') }}" method="post">
                @csrf
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label">ID</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--login-id">
                            <input type="text" name="login_id">
                        </div>
                    </div>
                    @error('login_id')
                    <div class="form__error">
                        <p class="form__error-message">
                            {{ $errors->first('login_id') }}
                        </p>
                    </div>
                    @enderror
                </div>
                <div class="form__group">
                    <div class="form__group-title">
                        <span class="form__label">パスワード</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--password">
                            <input type="password" name="password">
                        </div>
                    </div>
                    @error('password')
                    <div class="form__error">
                        <p class="form__error-message">
                            {{ $errors->first('password') }}
                        </p>
                    </div>
                    @enderror
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">ログインする</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>