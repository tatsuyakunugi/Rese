<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/list.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-item">
                <a class="header__logo" href="/menu">Rese</a>
            </div>
        </div>
    </header>
    <main class="main">
        @if(!$reviews)
        <dev class="message">
            <p>まだレビューはありません</p>
        </dev>
        @else
        <div class="list__content">
            <div class="list__content--inner">
                @foreach($reviews as $review)
                <div class="shop-card">
                    <h2 class="shop-name">
                        <p>{{ $review->shop->shop_name }}</p>
                    </h2>
                    <div class="shop__img">
                        <img src="{{ Storage::url($review->shop->shop_image_path) }}" alt="">
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-card__group">
                        <div class="review-card__item">
                            <span class="card__tag">お名前</span>
                            <p class="user-name">{{ $review->user->name }}さん</p>
                        </div>
                    </div>
                    <div class="review-card__group">
                        <div class="review-card__item">
                            <span class="card__tag">評価</span>
                            <p class="rating">{{ $review->rating }}</p>
                        </div>
                    </div>
                    <div class="review-card__group">
                        <div class="review-card__item">
                            <span class="card__tag">コメント</span>
                            <p class="comment">{{ $review->comment }}</p>
                        </div>
                    </div>
                    <div class="review-card__group">
                        <div class="review-card__item">
                            <span class="card__tag">投稿日</span>
                            <p class="posted-date">{{ ($review->created_at)->format('Y-m-d') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="home__link">
            <a class="home__link--button" href="/">戻る</a>
        </div>
    </main>
</body>
</html>