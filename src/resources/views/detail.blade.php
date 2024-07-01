<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
    <link href="https://use.fontawesome.com/releases/v6.5.2/css/all.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__icon" href="/menu"><i class="fa-solid fa-square-poll-horizontal"></i></a>
            <h2 class="header__logo">Rese</h2>
        </div>
    </header>
    <main class="main">
        <div class="detail__content">
            <div class="shop-detail">
                <div class="shop-detail__header">
                    <div class="link">
                        @if(Auth::check())
                        <a class="link__button" href="/mypage"><i class="fa-solid fa-less-than"></i></a>
                        @endif
                    </div>
                    <div class="shop-name">
                        <p>{{ $shop->shop_name }}</p>
                    </div>
                </div>
                <div class="shop__img">
                   <img src="{{ Storage::url($shop->shop_image_path) }}" alt="">
                </div>
                <div class="shop__tag">
                    <p class="shop-area">#{{ $shop->area->area_name }}</p>
                    <p class="shop-genre">#{{ $shop->genre->genre_name }}</p>
                </div>
                <div class="shop__content"> 
                    <p>{{ $shop->content }}</p>
                </div>
                <div class="review__link-form">
                    <a class="review__link" href="/list/{{ $shop->id }}">このお店のレビューをを見る</a>
                </div>
            </div>
            <livewire:reservation :shop="$shop">
        </div>  
    </main>
    @livewireScripts
</body>
</html>