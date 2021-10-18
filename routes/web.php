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

//投稿処理
Route::get('post/destroy/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');

//利用規約（プライバシーポリシー）
Route::get('about', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');

//ログイン（管理者権限）：ルーティング変更
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('shudhshdjhs/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm']);
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('auth.register');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
