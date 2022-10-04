@extends('account.layouts.header')

@section('content')
<div class="container">
    <h4>ユーザー新規登録</h4>
    <!-- routeをあとで変更すること。 -->
    <form action="{{ route('account.store') }}" method="POST">
        @csrf
        <fieldset>
            <div class="col-xs-2">
                <div class="form-group">    
                    <label class="control-label" for="user_name">{{ __('name') }}</label>
                </div>
                <input type="text" class="form-control" name="user_name" id="user_name" value="{{ old('user_name') }}">
            </div>
            <div class="form-group">
                <label for="user_email">{{ __('email') }}</label>
                <input type="email" class="form-control col-xs-2" name="user_email" id="user_email" value="{{ old('user_email') }}">
            </div>
            <div class="form-group">
                <label for="user_password">{{ __('password') }}</label>
                <input type="password" class="form-control col-xs-2" name="user_password" id="user_password" value="">
            </div>
            <div class="form-group">
                <label for="user_password_confirmation">{{ __('password:確認用') }}</label>
                <input type="password" class="form-control col-xs-2" name="user_password_confirmation" id="user_password_confirmation" value="">
            </div>

            <div class="d-flex justify-content-between pt-3">
            <a href="{{ route('account.login') }}" class="btn btn-outline-secondary" role="button"><i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  ログイン画面へ') }}</a>
                <button type="submit" class="btn btn-success">{{ __('登録') }}</button>
            </div>
            <div class="my-3">
                @include('account.common.errors')
            </div>
        </fieldset>
    </form>
</div>
@endsection