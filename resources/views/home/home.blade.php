<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>TEAM115</title>
</head>

<body>
    @include('parts.navi')
    <div class="container">
<<<<<<< HEAD
        <h1>新着アイテム</h1>
        <table class="table">

            <tr>
                <th>商品ID</th>
                <th>商品種別</th>
                <th>商品名</th>
                <th>更新日</th>
                <th>登録日</th>
            </tr>
            @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$type[$item->type]}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->updated_at}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
        </table>
        <img src="/assets/img/main.jpg" alt="" class="img-fluid">
=======
    <h1>新着アイテム</h1>
    <table class="table">
    
        <tr>
            <th>商品ID</th>
            <th>商品種別</th>
            <th>商品名</th>
            <th>更新日</th>
            <th>登録日</th>
        </tr>  
        @foreach($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$type[$item->type]}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->updated_at}}</td>
            <td>{{$item->created_at}}</td>
        </tr>
        @endforeach
    </table>
    <img src="/assets/img/main.jpg" alt="" class="img-fluid"> 
>>>>>>> 1a9e3feecaad9dcd18b835108540ae6c51cbe876
    </div>

</body>

</html>