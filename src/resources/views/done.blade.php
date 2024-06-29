<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/done.css') }}" />
    <link href="https://use.fontawesome.com/releases/v6.5.2/css/all.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/menu"><i class="fa-solid fa-square-poll-horizontal"></i>Rese</a>
        </div>
    </header>
    <main class="main">
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
    </main>
</body>
</html>