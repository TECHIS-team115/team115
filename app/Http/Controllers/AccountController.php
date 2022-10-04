<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * login画面への遷移
     */
    public function login()
    {
        return view('account.login');
    }

    /**
     * ユーザー登録画面への遷移
     */
    public function register()
    {
        return view('account.create');
    }

    /**
     * 仮ホーム画面への遷移
     */
    public function home()
    {
        return view('account.temporary');
    }

    /**
     * データベース登録_バリデーション
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'user_name' => 'required',
                'user_email' => 'required|unique:users,email|email',
                'user_password' => 'required|min:8|confirmed',
                'user_password_confirmation' => 'required|min:8'
            ],
            [
                'user_name.required' => '名前を入力して下さい。',
                'user_email.required' => 'メールアドレスを入力して下さい。',
                'user_email.unique' => 'すでに登録済みのメールアドレスです。',
                'user_email.email' => 'メールアドレス形式で入力して下さい。',
                'user_password.required' => 'パスワードを入力して下さい。',
                'user_password_confirmation.required' => '確認用パスワードを入力して下さい。',
                'user_password_confirmation.min' => 'パスワードは最低8文字です。',

            ]
            );

        $registerUser = $this->user->InsertUser($request);
        return redirect()->route('account.login');
    }

    /**
     * ログイン認証
     */

    public function signin(Request $request)
    {
        $validated = $request->validate(
            [
                'user_email' => 'email|required',
                'user_password' => 'required|min:8'
            ],
            [
                'user_email.email' => 'メールアドレス形式で入力して下さい。',
                'user_email.required' => 'メールアドレスを入力して下さい。',
                'user_password.required' => 'パスワードを入力して下さい。',
                'user_password.min' => 'パスワードは最低8文字です。',

            ]
        );

        if(Auth::attempt([
            'email' => $request->input('user_email'),
            'password' => $request->input('user_password')
        ])){
            return redirect()->route('account.home');
        }
        return redirect()->back();
        }
}
