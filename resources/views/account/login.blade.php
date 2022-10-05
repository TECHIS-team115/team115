@extends('account.layouts.header')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <h4>ログイン</h4>
    </div>
    <form action="{{ route('account.signin') }}" method="POST">
        @csrf
        <fieldset>
            <div class="col-lg-4 mx-auto">
                <div class="form-group">
                    <label for="user_email">{{ __('email') }}</label>
                    <input type="email" class="form-control" name="user_email" id="user_email" value="{{ old('user_email') }}">
                </div>
                <div class="form-group">
                    <label for="user_password">{{ __('password') }}</label>
                    <input type="password" class="form-control" name="user_password" id="user_password" value="">
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <button type="submit" class="btn btn-success">{{ __('ログイン') }}</button>
                </div>
                <div class="d-flex justify-content-center pt-3">
                    <a href="{{ route('account.register') }}" class="btn btn-link" role="button"><i class="fa fa-chevron-left mr-1" aria-hidden="true"></i>{{ __('  >>アカウント登録') }}</a>
                </div>
                <div class="my-3">
                    @include('account.common.errors')
                </div>
            </div>
        </fieldset>
    </form>
</div>
@endsection