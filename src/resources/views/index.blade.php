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
            <div class="header__item">
                <a class="header__logo" href="/menu">Rese</a>
            </div>
            <div class="header__item">
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
                        <input type="text" name="keyword" value="{{ $keyword }}" placeholder="Search...">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="検索">
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