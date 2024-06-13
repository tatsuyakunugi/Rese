<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/menu">Rese</a>
        </div>
    </header>
    <main class="main">
        <div class="mypage__content">
            <div class="user-name">
                <p>{{ $user->name }}</p>
            </div>
            <div class="mypage__inner">
                <div class="reservation__info">
                    <div class="reservation__info--title">
                        <p>予約状況</p>
                    </div>
                    @if(empty($reservations))
                    <div class="message">
                        <p>予約はありません</p>
                    </div>
                    @else
                    @foreach($reservations as $reservation)
                    <div class="reservation__card">
                        <div class="reservation__card__inner">
                            <div class= "reservation__card--group">
                                <div class="reservation__tag">
                                    <span>Shop</span>
                                </div>
                                <div class="shop-name">
                                    <p>{{ $reservation->shop->shop_name }}</p>
                                </div>
                            </div>
                            <div class= "reservation__card--group">
                                <div class="reservation__tag">
                                    <span>Date</span>
                                </div>
                                <div class="reservation-date">
                                    <p>{{ $reservation->reservation_date }}</p>
                                </div>
                            </div>
                            <div class = "reservation__card--group">
                                <div class="reservation__tag">
                                    <span>Time</span>
                                </div>
                                <div class="reservation-time">
                                    <p>{{ $reservation->reservation_time }}</p>
                                </div>
                            </div>
                            <div class = "reservation__card--group">
                                <div class="reservation__tag">
                                    <span>Number</span>
                                </div>
                                <div class="number-of-people">
                                    <p>{{ $reservation->number_of_people }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <div class="shop__wrapper">
                    @if(empty($shops))
                    <div class="message">
                        <p>お気に入り登録した店舗はありません</p>
                    </div>
                    @else
                    @foreach ($shops as $shop)
                    <div class="shop-card">
                        <div class="shop-card__img">
                            <img src="{{ Storage::url($shop->shop_image_path) }}" alt="">
                        </div>
                        <div class="shop-card__content">
                            <h2 class="shop-name">{{ $shop->shop_name }}</h2>
                            <div class="shop-card__content-tag">
                                <p class="shop-area">#{{ $shop->area->area_name }}</p>
                                <p class="shop-genre">#{{ $shop->genre->genre_name }}</p>
                            </div>
                            <div class="shop-card__items">
                                <div class="detail__link-button">
                                    <a class="detail__link" href="/detail/{{ $shop->id }}">詳しく見る</a>
                                </div>
                                <div class="shop__control">    
                                    @if(!Auth::user()->is_like($shop->id))
                                    <form class="like-form" action="{{ route('likes.store', $shop) }}" method="post">
                                        @csrf
                                        <button class="like-button" type="submit">お気に入り登録</button>
                                    </form>
                                    @else
                                    <form class="unlike-form" action="{{ route('likes.destroy', $shop) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="unlike-button" type="submit">お気に入り解除</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div> 
    </main>
</body>
</html>