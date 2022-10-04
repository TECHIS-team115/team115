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

Route::get('/Search', [App\Http\Controllers\SearchController::class, 'index']);
Route::get('/Search/detail/{id}', [App\Http\Controllers\SearchController::class, 'detailIndex']);

Route::post('/Search', [App\Http\Controllers\SearchController::class, 'getIndex'])->name('Search');