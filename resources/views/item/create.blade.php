<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<title>登録画面</title>

<body>

    <div style="width: 1000px; margin: 100px auto">
        <div style="text-align: center;">
            <h1>登録</h1>
        </div>

        <div class="col-sm-offset-3 col-sm-6">
            <button type="button" class="btn btn-primary btn-sm" style="padding: 5px 80px 5px 80px; " onclick="location.href='/item'">戻る</button>
        </div>

        <div style="text-align: center;">
            <form action="" method="POST">
                @csrf
                <p><input type="text" style="width: 40%; padding-left: 10px;" name="user_id" value="" placeholder="商品ID"></p>
                <p><input type="text" style="width: 40%; padding-left: 10px;" name="name" value="" placeholder="商品名"></p>
                <p><input type="text" style="width: 40%; padding-left: 10px;" name="type" value="" placeholder="種別"></p>
                <p><textarea type="text" style="width: 40%; padding-left: 10px;" name="detail" value="" placeholder="詳細"></textarea></p>

                <!-- 登録ボタン -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default" style="padding: 5px 80px 5px 80px;">登録</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>