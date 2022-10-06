<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<!-- Bootstrapの設定 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>ユーザー一覧</title>
</head>
<body>
    <div class="container">
        <!-- マージンを上下に設定 -->
        <div class="my-5">
        <!-- 青色ボタンを設定 -->
        <a class="btn btn-primary" href="/create">ホーム</a>
        </div>
        <hr>
        <h1 class="my-2">ユーザー一覧</h1>
        <table class="table table-borderd table-striped">
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>権限</th>
                <th colspan="2">編集</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>@if($user->role) 管理者 @else 利用者 @endif</td>
                <td><a class="btn btn-primary btn-sm" href="/user/edit/{{$user->id}}">編集</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>