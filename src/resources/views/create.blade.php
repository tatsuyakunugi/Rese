<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('shop_upload') }}" method="post" class="create-form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="shop_name" class="input_label">店名</label>
            <input type="text" class="input_form" name="shop_name">
        </div>
        <div class="form-group">
            <label for="area_id" class="input_label">エリアID</label>
            <input type="text" class="input_form" name="area_id">
        </div>
        <div class="form-group">
            <label for="genre_id" class="input_label">ジャンルID</label>
            <input type="text" class="input_form" name="genre_id">
        </div>
        <div class="form-group">
            <label for="content" class="input_label">店舗概要</label>
            <input type="text" class="input_form" name="content">
        </div>
        <div class="form-group">
            <label for="shop_image" class="input_label">画像</label>
            <input type="file" class="input_form" name="shop_image">
        </div>
        <button type="submit">登録</button>
    </form>
</body>
</html>