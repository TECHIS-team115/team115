<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

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
