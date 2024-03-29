<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>商品詳細</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
</head>
<body>
@include('parts.navi')
  <div class="container">
      <h2 style="text-align: center; ">ID: {{ $item->id }}<span style="margin-right: 50px;"></span>更新日: {{ $item->updated_at }}</h2>
      <h2 style="text-align: center; margin: 25px 0 150px 0;">名前: {{ $item->name }}<span style="margin-right: 50px;"></span>種別: {{ $type[$item->type] }}</h2>
      <h1 style="text-align: center; font-weight: bold;">{!! nl2br(e($item->detail)) !!}</h1>

  </div>
</body>
</html>