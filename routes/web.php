<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('account.login');
});


//ユーザー登録画面へ
Route::get('/register', [AccountController::class, 'register'])->name('account.register');
//ログイン画面へ遷移
Route::get('/login', [AccountController::class, 'login'])->name('account.login');
//仮ホーム画面へ
Route::get('/home', [AccountController::class, 'home'])->name('account.home');


//会員情報のデータベースへの登録。
Route::post('/store', [AccountController::class, 'store'])->name('account.store');
//ログイン認証処理
Route::post('/signin', [AccountController::class, 'signin'])->name('account.signin');
//ログアウト処理
Route::get('/logout', [AccountController::class, 'signout'])->name('account.logout');

//管理者権限でのアクセス制御
Route::middleware(['auth','can:adminUser'])->group(function(){
    //ユーザー管理画面への制限
    Route::get('/adminuserlist', [AccountController::class, 'manage'])->name('admin.manage');
    //商品編集画面への制限
    Route::get('/adminlist', [AccountController::class, 'itemList'])->name('admin.list');
});

