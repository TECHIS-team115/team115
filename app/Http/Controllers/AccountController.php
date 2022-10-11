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
        if(Auth::check()){
            return view('account.login');
        } else {
            return view('account.login');
        }
    }

    /**
     * ユーザー登録画面への遷移
     */
    public function register()
    {
        if(Auth::check()){
            return view('account.create');
        } else {
            return view('account.create');
        }
    }

    //使用しない。
    /**
     * ホーム画面への遷移。一般ユーザー
     */
    //public function home()
    //{
    //    if(Auth::check()){
    //        return view('home.index');
    //    } else {
    //        return view('account.login');
    //    }
    //}

    /**
     * ユーザー編集画面への遷移。管理者
     */
    //public function manage(){
    //    if(Auth::check()){
    //        return view('edit');
    //    } else {
    //        return view('account.login');
    //    }
    //}

    /**
     * 仮商品一覧への遷移。管理者
     */
    //public function itemList(){
    //    if(Auth::check()){
    //        return view('account.temporary_list');
    //    } else {
    //        return view('account.login');
    //    }
    //}

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
                'user_password.min' => 'パスワードは最低8文字です。',
                'user_password.confirmed' => 'パスワードが一致しません。',
                'user_password_confirmation.required' => '確認用パスワードを入力して下さい。',
                'user_password_confirmation.min' => '確認用パスワードは最低8文字です。',
            ]
            );

        $registerUser = $this->user->InsertUser($request);
        return redirect()->route('account.login');
    }

    /**
     * ログイン認証処理_バリデーション
     */

    public function signin(Request $request)
    {
        $validated = $request->validate(
            [
                'user_email' => 'required|email',
                'user_password' => 'required|min:8'
            ],
            [
                'user_email.required' => 'メールアドレスを入力して下さい。',
                'user_email.email' => 'メールアドレス形式で入力して下さい。',
                'user_password.required' => 'パスワードを入力して下さい。',
                'user_password.min' => 'パスワードは最低8文字です。',
            ]
        );

        if(Auth::attempt([
            'email' => $request->input('user_email'),
            'password' => $request->input('user_password')
        ])){
            return redirect()->route('home.index');
        }
            return redirect()->back();
    }

    /**
     * ログアウト処理
     */
    public function signout(){
        Auth::logout();
        return redirect()->route('account.login');
    }
}
