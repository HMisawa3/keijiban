<?php

use Illuminate\Support\Facades\Route;

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

//プロジェクト詳細画面（トップ画面）
Route::get('/', [App\Http\Controllers\ThemeController::class, 'index'])->name('theme.index');

//投稿処理
Route::post('post/store', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
