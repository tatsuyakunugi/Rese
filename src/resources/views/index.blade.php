<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link href="https://use.fontawesome.com/releases/v6.5.2/css/all.css" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__item">
                <a class="header__icon" href="/menu"><i class="fa-solid fa-square-poll-horizontal"></i></a>
                <h2 class="header__logo">Rese</h2>
            </div>
            <div class="header__item">
                <form class="sort-form" action="{{ route('shop.sort') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <select class="sort-select" name="sort_id" id="sort_id">
                            <option value="">並び替え：評価高/低</option>
                            <option value="1">ランダム</option>
                            <option value="2">評価が高い順</option>
                            <option value="3">評価が低い順</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="sort-form__button-submit" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
                <form class="search-form" action="{{ route('shop.index') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <select class="area-select" name="area_id" id="area_id">
                            <option value="">All area</option>
                            @foreach($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="genre-select" name="genre_id" id="genre_id">
                            <option value="">All genre</option>
                            @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="search-form__button-submit" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                    <div class="form-group">
                        <input class="keyword-select" type="text" name="keyword" value="{{ $keyword }}" placeholder="Search...">
                    </div>
                </form>
            </div>
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
                            <p class="shop-area">#{{ $shop->area->area_name }}</p>
                            <p class="shop-genre">#{{ $shop->genre->genre_name }}</p>
                        </div>
                        <div class="shop-card__items">
                            <div class="detail__link-button">
                                <a class="detail__link" href="/detail/{{ $shop->id }}">詳しく見る</a>
                            </div>
                            @if(Auth::check())
                            <div class="shop__control">    
                                @if(!Auth::user()->is_like($shop->id))
                                <form class="like-form" action="{{ route('likes.store', $shop) }}" method="post">
                                    @csrf
                                    <button class="like-button" type="submit">
                                        <i class="fa-regular fa-heart"></i>
                                    </button>
                                </form>
                                @else
                                <form class="unlike-form" action="{{ route('likes.destroy', $shop) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="unlike-button" type="submit">
                                        <i class="fa-solid fa-heart"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</body>
</html>