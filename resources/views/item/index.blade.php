<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>商品管理</title>
</head>

<body>
    @include('parts.navi')
    <h2 style="background-color: #E0E0DE; padding: 10px 10px 10px 10px; margin-top: -20px;">商品管理</h1>

        <div class="container">

            <div style="padding-top: 20px">
                <button type="button" class="btn btn-primary btn-lg" onclick="location.href='/item/create'">商品登録</button>
            </div>

            <div style="padding-top: 20px">
                <table class="table table-hover table-bordered">
                    <thead class="table-light" style="text-align: center;">
                        <tr>
                            <th style="width: 3%;">ID</th>
                            <th style="width: 8%;">種別</th>
                            <th style="width: 17%;">商品名</th>
                            <th style="width: 32%;">詳細</th>
                            <th style="width: 14%;">登録日時</th>
                            <th style="width: 14%;">更新日時</th>
                            <th style="width: 7%;">ステータス</th>
                            <th style="width: 5%;"></th>
                        </tr>
                    </thead>
                    @foreach ($items as $item)
                    <tr>
                        <td style="padding-left: 10px; word-break:break-all;">{{ $item->id }}</td>
                        <td style="padding-left: 10px; word-break:break-all;">{{ $type[$item->type] }}</td>
                        <td style="padding-left: 10px; word-break:break-all;">{{ $item->name }}</td>
                        <td style="padding-left: 10px; word-break:break-all;">{{ $item->detail }}</td>
                        <td style="padding-left: 10px; word-break:break-all;">{{ $item->created_at }}</td>
                        <td style="padding-left: 10px; word-break:break-all;">{{ $item->updated_at }}</td>
                        <td style="padding-left: 10px; word-break:break-all;">@if($item->status)公開 @else 停止 @endif</td>
                        <td><a class="btn btn-warning btn-sm" href="/item/{{ $item->id }}/edit">編集</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

</body>

</html>