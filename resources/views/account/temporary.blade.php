@extends('account.layouts.header')

@section('content')
<div class="container">
    <h4>仮ホーム</h4>

<li><a href="{{ route('account.logout') }}">ログアウト</a></li>
</div>
@endsection