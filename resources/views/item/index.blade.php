<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<title>一覧画面</title>

<body>

    <div style="width: 1000px; margin: 100px auto;">
        <div style="text-align: center;">
            <h1>一覧</h1>
        </div>

        <div class="col-sm-offset-3 col-sm-6">
            <button type="button" class="btn btn-primary btn-sm" style="padding: 5px 80px 5px 80px; " onclick="location.href='/item/create'">商品登録</button>
        </div>

        <div>
            <table border="1" style="border-collapse: collapse;">
                <tr>
                    <th style="width: 80px;">商品ID</th>
                    <th style="width: 160px;">商品名</th>
                    <th style="width: 120px;">ステータス</th>
                    <th style="width: 60px;">種別</th>
                    <th style="width: 300px;">詳細</th>
                    <th style="width: 300px;">登録日時</th>
                    <th style="width: 300px;">更新日時</th>
                    <th style="width: 60px;"></th>
                </tr>
                @foreach ($items as $item)
                <tr>
                    <td style="padding-left: 10px; word-break:break-all;">{{ $item->user_id }}</td>
                    <td style="padding-left: 10px; word-break:break-all;">{{ $item->name }}</td>
                    <td style="padding-left: 10px; word-break:break-all;">{{ $item->status }}</td>
                    <td style="padding-left: 10px; word-break:break-all;">{{ $item->type }}</td>
                    <td style="padding-left: 10px; word-break:break-all;">{{ $item->detail }}</td>
                    <td style="padding-left: 10px; word-break:break-all;">{{ $item->created_at }}</td>
                    <td style="padding-left: 10px; word-break:break-all;">{{ $item->updated_at }}</td>
                    <td style="padding-left: 10px;"><a href="/item/{{ $item->id }}/edit">編集</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>

</html>