<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>商品一覧 / 検索</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
@include('parts.navi') 
    <div class="container">  
            <div style="text-align: center;">
                <h4 style="font-weight: bold; margin: 25px 0;">名前をクリックすると詳細画面が出てきます。</h4>
                <h4 style="font-weight: bold; margin: 25px 0;">IDと名前から検索できます。</h4>
                <form  action="{{ route('Search') }}" class="form-inline" style="margin-bottom: 25px;">
                    @csrf
                    <input class="form-control mr-sm-1" type="text" name="keyword" style="width: 25%; margin: 0 auto; margin-bottom: 10px;" placeholder="キーワード検索" value="@if (isset($keyword)) {{ $keyword }} @endif">
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
                {{ $data->appends(request()->query())->links('pagination::bootstrap-4') }}     
    </div>
</body>
</html>