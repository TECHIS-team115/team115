<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    $user->name=$request->name;
    $user->email=$request->email;
    $user->role=empty($request->role) ? 0 : 1;
    $user->save();

    return redirect('/user');
}





}

