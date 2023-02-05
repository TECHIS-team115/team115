<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    //ログインしていないときはログイン画面へ遷移させる。20221010_KojiYoshida
    public function __construct(){
        $this->middleware('auth');
    }
    /**
    * ユーザー一覧
    *
    * @param Request $request
    * @return Response
    */
    public function index(Request $request)
    {
        $users = User::orderBy('created_at', 'asc')->get();
        return view('users.index', [
            'users' => $users,
        ]);
    }

    /**
        * 編集画面の表示
        * @param Request $request
        * @return Response
        */
    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    /**
     * 指定したユーザーの更新
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $user=User::find($request->id);
        $reg='';
        if($user->email != $request->email){
            $reg='|unique:users';
        }
        $rules=[
            'name' => 'required',
            'email' => 'required|email'.$reg,
            ];
        $msg=[
            'name.required' => '氏名は入力必須です。',
            'email.required' => 'メールアドレスは入力必須です。',
            'email.email' => 'メールアドレスの形式に誤りがあります。',
            'email.unique' => 'このメールアドレスは登録済です。',
            ];
        //dd($rules);
        $role=empty($request->role) ? 0 : 1;
        $old_role=$user->role;

        $validated = $request->validate($rules,$msg);    
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$role;
        $user->save();
       
        if(auth::id()==$request->id && $old_role != $role){return redirect('/logout');}
        return redirect('/user');
    }
}