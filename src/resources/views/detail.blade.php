<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
    @livewireStyles
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/menu">Rese</a>
        </div>
    </header>
    <main class="main">
        <div class="detail__content">
            <div class="shop-detail">
                <div class="shop-detail__header">
                    <div class="link">
                        @if(Auth::check())
                        <a class="link__button" href="mypage"><</a>
                        @endif
                    </div>
                    <div class="shop-name">
                        <h2>{{ $shop->shop_name }}</h2>
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
            </div>
            <livewire:reservation :shop="$shop">
        </div>  
    </main>
    @livewireScripts
</body>
</html>