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
        <div class="detail__content">
            <div class="shop-detail">
                <div class="shop-detail__header">
                    <div class="link">
                        <a href=""><</a>
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
            @if(Auth::check())
            <div class="reservation-detail">
                <div class="reservation-card">
                    <form class="reservation-form" action="/done" method="get">
                        <div class="reservation__title">
                            <h2>予約</h2>
                        </div>
                        <div class="select__reservation-date">
                            <input type="date" name="date">
                        </div>
                        <div class="select__reservation-time">
                            <select class="select__time" name="time" id="time">
                                @foreach($times as $key => $time_variation)
                                <option value="{{ $key }}">{{ $time_variation }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="select__number_of_people">
                            <select class="select__number_of_people" name="number_of_people" id="number_of_people">
                                <option>選択してください</option>
                                @for($i = 1; $i <= 30; $i++)
                                <option>{{ $i }}人</option>
                                @endfor
                            </select>
                        </div>
                        <div class="reservation-form__button">
                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                            <button class="reservation-form__button-submit" type="submit">予約する</button>
                        </div>    
                    </form>
                </div>
            </div>
            @endif
        </div>  
    </main>
</body>
</html>