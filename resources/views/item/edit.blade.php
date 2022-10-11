<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{ $item->name }}</title>
</head>

<body>
    @include('parts.navi')
    <h2 style="background-color: #E0E0DE; padding: 10px 10px 10px 10px; margin-top: -20px;">商品情報編集</h1>
        <div class="container">

            <!-- 戻るボタン -->
            <div style="padding-top: 20px">
                <button type="button" class="btn btn-secondary btn-lg" onclick="location.href='/item'">戻る</button>
            </div>

            <!-- 編集フォーム -->
            <div style="padding-top: 40px">
                <p>
                <form action="{{ url('item/'.$item->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <p style="margin-bottom: 0">商品名<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('name')}}</span></p>
                    <p><input type="text" style="width: 60%; padding-left: 10px; margin: 0 0 20px 0;" name="name" value="{{ $item->name }}"></p>

                    <P style="margin-bottom: 0">商品種別<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('type')}}</span></P>
                    <p>
                        <select style="width: 30%; padding-left: 10px; margin: 0 0 20px 0;" name="type" value="{{ $item->type }}">
                            @foreach($type as $key => $value)
                            <option value="{{ $key }}" {{old('type',$item->type)==$key ? "selected" : ""}}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </P>

                    <p style="margin-bottom: 0">詳細<span style="padding-left: 10px;" class="help-block text-danger">{{$errors->first('detail')}}</span></p>
                    <p><textarea type="text" style="width: 80%; padding-left: 10px; margin: 0 0 20px 0;" name="detail" value="{{ $item->detail }}">{{ $item->detail }}</textarea></p>
                    

                    <P style="margin-bottom: 0">ステータス</P>
                    <p>
                        <select style="width: 15%; padding-left: 10px; margin: 0 0 20px 0;" name="status" value="{{ $item->status }}">
                            <option value="active" @if($item->status)selected @endif>公開</option>
                            <option value="" @if(!$item->status)selected @endif>停止</option>
                        </select>
                    </P>

                    <!-- 更新ボタン -->
                    <button type="submit" id="update-item-{{ $item->id }}" class="btn btn-primary btn-lg" style="margin-top: 30px;">更新</button>
                </form>
                </p>
            </div>

            <!-- 削除ボタン -->
            <div>
                <p style="margin-top: 30px;">
                <form action="{{ url('item/'.$item->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" id="delete-item-{{ $item->id }}" class="btn btn-danger btn-lg">削除</button>
                </form>
                </p>
            </div>
        </div>

</body>

</html>