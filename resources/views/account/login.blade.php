@extends('account.layouts.header')

@section('content')
<div class="container">
    <h4>ログイン</h4>
    <!-- routeをあとで変更すること。 -->
    <form action="{{ route('account.signin') }}" method="POST">
        @csrf
        <fieldset>
            <div class="col-xs-2">
            <div class="form-group">
                <label for="user_email">{{ __('email') }}</label>
                <input type="email" class="form-control col-xs-2" name="user_email" id="user_email" value="{{ old('user_email') }}">
            </div>
            <div class="form-group">
                <label for="user_password">{{ __('password') }}</label>
                <input type="password" class="form-control col-xs-2" name="user_password" id="user_password" value="">
            </div>
            <div class="d-flex justify-content-between pt-3">
            <a href="{{ route('account.register') }}" class="btn btn-outline-secondary" role="button"><i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  アカウント登録') }}</a>
                <button type="submit" class="btn btn-success">{{ __('ログイン') }}</button>
            </div>
            <div class="my-3">
                @include('account.common.errors')
            </div>
        </fieldset>
    </form>
</div>
@endsection