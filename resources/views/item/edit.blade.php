<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<title>編集画面</title>

<body>

    <div style="width: 1000px; margin: 100px auto">
        <div style="text-align: center;">
            <h1>{{ $item->name }}</h1>
        </div>

        <div class="col-sm-offset-3 col-sm-6">
            <button type="button" class="btn btn-primary btn-sm" style="padding: 5px 80px 5px 80px; " onclick="location.href='/item'">戻る</button>
        </div>
        
        <!-- 編集フォーム -->
        <div style="text-align: center;">
            <p>
            <form action="{{ url('item/'.$item->id) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <p>商品ID<input type="text" style="width: 40%; padding-left: 10px;" name="user_id" value="{{ $item->user_id }}"></p>
                <p>商品名<input type="text" style="width: 40%; padding-left: 10px;" name="name" value="{{ $item->name }}"></p>
                <P>ステータス 
                    <select style="width: 40%; padding-left: 10px;" name="status" value="{{ $item->status }}">
                        <option>active</option>
                        <option>inactive</option>
                        <option selected hidden>{{ $item->status }}</option>
                    </select>
                </P>
                <p>種別<input type="text" style="width: 40%; padding-left: 10px;" name="type" value="{{ $item->type }}"></p>
                <p>詳細<textarea type="text" style="width: 40%; padding-left: 10px;" name="detail" value="{{ $item->detail }}">{{ $item->detail }}</textarea></p>
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