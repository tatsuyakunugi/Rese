<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
    <link href="https://use.fontawesome.com/releases/v6.5.2/css/all.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__icon" href="/menu"><i class="fa-solid fa-square-poll-horizontal"></i></a>
            <h2 class="header__logo">Rese</h2>
        </div>
    </header>
    <main class="main">
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
    </main>
</body>
</html>