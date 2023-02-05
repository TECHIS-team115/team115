<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>商品登録</title>
</head>

<body>
    @include('parts.navi')
    <h2 style="background-color: #E0E0DE; padding: 10px 10px 10px 10px; margin-top: -20px;">商品登録</h1>
        <div class="container">

            <!-- 戻るボタン -->
            <div style="padding-top: 20px">
                <button type="button" class="btn btn-secondary btn-lg" onclick="location.href='/item'">戻る</button>
            </div>

            <!-- 入力フォーム -->
            <div style="padding-top: 40px; margin-top: 20px;">
                <form action="" method="POST">
                    @csrf

                    <p style="margin-bottom: 0">商品名<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('name')}}</span></p>
                    <p><input type="text" style="width: 60%; padding-left: 10px; margin-bottom: 20px;" name="name" value="{{ old('name') }}" placeholder="商品名を入力"></p>

                    <P style="margin-bottom: 0">種別<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('type')}}</span></P>
                    <P>
                        <select style="width: 30%; padding-left: 10px; margin-bottom: 20px;" name="type">
                            <option value="" style="display: none;"></option>
                            @foreach($type as $key => $value)
                            <option value="{{$key}}" {{old('type')==$key ? "selected" : ""}}>{{ $value }}</option>
                            @endforeach

                        </select>
                    </P>

                    <p style="margin-bottom: 0">詳細<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('detail')}}</span></p>
                    <p><textarea type="text" style="width: 80%; padding-left: 10px;" name="detail" placeholder="詳細を入力">{{ old('detail') }}</textarea></p>

                    <!-- 登録ボタン -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg" style="margin-top: 30px;">登録</button>
                    </div>
                </form>
            </div>
        </div>
        </form>
</body>

</html>