<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url) //本番環境で投稿機能のセキュリティを回避するため引数追加
    {
        $url->forceScheme('https'); //本番環境で投稿機能のセキュリティを回避するため追加
    }
}
