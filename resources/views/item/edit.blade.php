<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<title>{{ $item->name }}</title>

<body>

    <div style="width: 1400px; margin: 100px auto">
        <div style="text-align: center;">
            <h1>{{ $item->name }}</h1>
        </div>

        <!-- 戻るボタン -->
        <div class="col-sm-offset-3 col-sm-6">
            <button type="button" class="btn btn-primary btn-sm" style="padding: 5px 80px 5px 80px; " onclick="location.href='/item'">戻る</button>
        </div>

        <!-- 編集フォーム -->
        <div style="text-align: center;">
            <p>
            <form action="{{ url('item/'.$item->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <p>商品名<input type="text" style="width: 40%; padding-left: 10px;" name="name" value="{{ $item->name }}"></p>
                
                <P>種別
                    <select style="width: 40%; padding-left: 10px;" name="type" value="{{ $item->type }}">
                    @foreach($item as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    <option selected hidden>{{ $item->type }}</option>
                    </select>
                </P>

                <p>詳細<textarea type="text" style="width: 40%; padding-left: 10px;" name="detail" value="{{ $item->detail }}">{{ $item->detail }}</textarea></p>
                <P>ステータス
                    <select style="width: 40%; padding-left: 10px;" name="status" value="{{ $item->status }}">
                        <option value="active" @if($item->status)selected @endif>公開</option>
                        <option value="" @if(!$item->status)selected @endif>停止</option>
                    </select>
                </P>
                <!-- 登録ボタン -->
                <button type="submit" id="update-item-{{ $item->id }}" class="btn btn-danger" style="padding: 5px 80px 5px 80px;">編集</button>
            </form>
            </p>
        </div>

        <!-- 削除ボタン -->
        <div style="text-align: center;">
            <p>
            <form action="{{ url('item/'.$item->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" id="delete-item-{{ $item->id }}" class="btn btn-danger" style="padding: 5px 80px 5px 80px;">削除</button>
            </form>
            </p>
        </div>
    </div>

</body>

</html>