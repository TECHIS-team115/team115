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
        @include('parts.navi')   
            <div style="text-align: center;">
                <h4 style="font-weight: bold; margin: 25px 0;">名前をクリックすると詳細画面が出てきます。</h4>
                <form  action="{{ route('Search') }}" class="form-inline" style="margin-bottom: 25px;">
                    @csrf
                    <input class="form-control mr-sm-1" type="text" name="keyword" placeholder="キーワード検索" value="@if (isset($keyword)) {{ $keyword }} @endif">
                    <button class="btn btn-primary" type="submit">検索</button>
                </form>
            </div> 
            <div class="col-15 ml-8">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>名前</th>
                            <th>種別</th>
                            <th>更新日</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $val)
                        <tr>
                            <td>{{ $val->id }}</td>
                            <td><a href="/Search/detail/{{ $val->id }}">{{ $val->name }}</a></td>
                            <td>{{ $type[$val->type] }}</td>
                            <td>{{ $val->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>  
                @foreach ($data as $val)
                    {{ $val->id }}
                @endforeach
                {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}     
    </div>
    


<!-- Bootstrap Javascript(jQuery含む) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>