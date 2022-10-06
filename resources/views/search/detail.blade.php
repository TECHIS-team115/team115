<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'laravel') }}</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark mt-3 mb-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h4 class="navbar-brand">商品管理システム</h4>
        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <h4 style="color: white; margin-right: 150px;">詳細画面</h4>
                </li>
                <li class="nav-item active">
                    <a href="/Search" style="color: white;"><h4>一覧画面へ戻る</h4></a>
                </li>
            </ul>
        </div>
    </nav> 
    <h2 style="text-align: center; ">ID: {{ $item->id }}<span style="margin-right: 50px;"></span>更新日: {{ $item->updated_at }}</h2>
    <h2 style="text-align: center; margin: 25px 0 150px 0;">名前: {{ $item->name }}<span style="margin-right: 50px;"></span>種別: {{ $item->type }}</h2>
    <h1 style="text-align: center; font-weight: bold;">{!! nl2br(e($item->detail)) !!}</h1>

  </div>


<!-- Bootstrap Javascript(jQuery含む) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>