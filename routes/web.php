<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;

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

////  ↓↓一般ユーザーでのアクセス制御↓↓  ////

//ユーザー登録画面へ
Route::get('/register', [AccountController::class, 'register'])->name('account.register');
//ログイン画面へ遷移
Route::get('/login', [AccountController::class, 'login'])->name('account.login');
//ホーム画面へ
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
//会員情報のデータベースへの登録。
Route::post('/store', [AccountController::class, 'store'])->name('account.store');
//ログイン認証処理
Route::post('/signin', [AccountController::class, 'signin'])->name('account.signin');
//ログアウト処理
Route::get('/logout', [AccountController::class, 'signout'])->name('account.logout');
// 一覧画面の表示
Route::get('/Search', [SearchController::class, 'index']);
// 詳細画面の表示
Route::get('/Search/detail/{id}', [SearchController::class, 'detailIndex']);
// キーワード検索
Route::get('/Search', [SearchController::class, 'getIndex'])->name('Search');

////  ↑↑一般ユーザーでのアクセス制御↑↑  ////


////  ↓↓管理者権限でのアクセス制御↓↓  //// *管理者は一般含む全てのurlへアクセスできる。管理者権限の設定については、providers/AuthServiceProvider.phpで定義。

Route::middleware(['auth', 'can:adminUser'])->group(function () {
    //ユーザー管理画面への制限
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');   
    //ユーザ情報編集画面への制限
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    //ユーザ情報更新処理
    Route::post('/user/edit', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    // 一覧画面表示
    Route::get('/item', [App\Http\Controllers\ItemController::class, 'index']);
    // 登録画面表示
    Route::get('/item/create', [App\Http\Controllers\ItemController::class, 'create']);
    // 編集画面表示
    Route::get('/item/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit']);
    // 登録処理
    Route::post('/item/create', [App\Http\Controllers\ItemController::class, 'store']);
    // 編集処理
    Route::put('/item/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    // 削除処理
    Route::delete('/item/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
});

////  ↑↑管理者権限でのアクセス制御↑↑  ////


