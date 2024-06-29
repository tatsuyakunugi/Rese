<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link href="https://use.fontawesome.com/releases/v6.5.2/css/all.css" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/menu"><i class="fa-solid fa-square-poll-horizontal"></i>Rese</a>
        </div>
    </header>
    <main class="main">
        <div class="edit__content">
            <div class="shop-detail">
                <div class="shop-detail__header">
                    <div class="link">
                        <a class="link__button" href="/mypage"><</a>
                    </div>
                    <div class="reservation__status">
                        <p>現在のご予約状況</p>
                    </div>
                </div>
                <div class="shop__img">
                   <img src="{{ Storage::url($reservation->shop->shop_image_path) }}" alt="">
                </div>
                <div class="reservation__status--group">
                    <div class="reservation__status-tag">
                        <span>Shop</span>
                    </div>
                    <div class="shop-name">    
                        <p>{{ $reservation->shop->shop_name }}</p>
                    </div>
                </div>
                <div class="reservation__status--group">
                    <div class="reservation__status-tag">
                        <span>Date</span>
                    </div>
                    <div class="reservation-date">    
                        <p>{{ $reservation->reservation_date}}</p>
                    </div>
                </div>
                <div class="reservation__status--group">
                    <div class="reservation__status-tag">
                        <span>Time</span>
                    </div>
                    <div class="reservation-time">
                        <p>{{ $reservation->reservation_time }}</p>
                    </div>
                </div>
                <div class="reservation__status--group">
                    <div class="reservation__status-tag">
                        <span>Number</span>
                    </div>
                    <div class="number-of-people">
                        <p>{{ $reservation->number_of_people }}</p>
                    </div>
                </div>   
            </div>
            <livewire:reservation-edit :reservation="$reservation">
        </div> 
    </main>
    @livewireScripts
</body>
</html>