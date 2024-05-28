<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/menu">Rese</a>
        </div>
    </header>
    <main class="main">
        <div class="shop__content">
            <div class="shop__wrapper">
                @foreach ($shops as $shop)
                <div class="shop-card">
                    <div class="shop-card__img">
                        <img src="{{ Storage::url($shop->shop_image_path) }}" alt="">
                    </div>
                    <div class="shop-card__content">
                        <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                        <div class="shop-card__content-tag">
                            <p class="shop-area">＃{{ $shop->area->area_name }}</p>
                            <p class="shop-genre">＃{{ $shop->genre->genre_name }}</p>
                        </div>
                        <div class="link">
                            <a class="detail__link" href="/detail">詳しく見る</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>