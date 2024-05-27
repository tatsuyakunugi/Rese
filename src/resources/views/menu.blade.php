<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="link">
                <a class="return__link" href="/">✕</a>
            </div>
        </div>
    </header>
    <main class="main">
        <div class="menu-content">
            <nav class="menu-nav">
                <ul class="menu-nav__inner">
                    <li class="menu-nav__item">
                        <a class="menu-nav__link" href="/">Home</a>
                    </li>
                    @if(Auth::check())
                    <li class="menu-nav__item">
                        <form class="logout-form" action="/logout" method="get">
                            @csrf
                            <button class="logout-form__button">Logout</button>
                        </form>
                    </li>
                    <li class="menu-nav__item">
                        <a class="menu-nav__link" href="/mypage">Mypage</a>
                    </li>
                    @else
                    <li class="menu-nav__item">
                       <form class="register-form" action="/register" method="get">
                           @csrf
                           <button class="register-form__button">Registration</button>
                       </form> 
                    </li>
                    <li class="menu-nav__item">
                        <form class="login-form" action="/login" method="get">
                            @csrf
                            <button class="login-form__button">Login</button>
                        </form>
                    </li>
                    @endif
                </ul>
            </nav>
        </div>
    </main>
</body>
</html>