<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link href="https://use.fontawesome.com/releases/v6.5.2/css/all.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h2 class="header__logo">Rese</h2>
            <div class="header__item">
                <form class="logout-form" action="{{ url('admin/logout') }}" method="post">
                    @csrf
                    <button class="logout-form__button" type="submit">ログアウト</button>
                </form>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>