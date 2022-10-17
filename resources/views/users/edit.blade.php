<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<!-- Bootstrapの設定 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>編集画面</title>
</head>
<body>
@include('parts.navi')
    <div class="container">
        <!-- マージンを上下に設定 -->
        <div class="my-5">
        </div>
        <hr>
        <h1 class="my-2">ユーザー情報編集</h1>
        <p>ID:
        <tr>
            <td>{{$user->id}}</td>
        </tr>       
    
    <form method="post" action="/user/edit" enctype="multipart/form-data">
        @csrf
        <p>氏名<br>    
            <input type="text" name="name" value="{{$user->name}}"><br>
            @if($errors->has('name'))<br><span>{{ $errors->first('name') }}</span> @endif
        <p>メールアドレス<br>    
            <input type="text" name="email" value="{{$user->email}}"><br>
            @if($errors->has('email'))<br><span>{{ $errors->first('email') }}</span> @endif
            <br>
            <label><input type="checkbox" name="role" value="1" @if($user->role) checked @endif>管理者権限</label><br>
            <input type="submit" value="更新" class="btn btn-primary">
            <input type="hidden" name="id" value="{{$user->id}}">
    </form>
    </div>
</body>
</html>