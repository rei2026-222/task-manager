<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginViewResponse; // 追加
use Laravel\Fortify\Fortify;


{
    // ログイン画面の表示を設定
    Fortify::loginView(function () {
        return view('auth.login');
    });
}
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // ログイン画面のビューをFortifyに教える設定
        $this->app->singleton(LoginViewResponse::class, function () {
            return new class implements LoginViewResponse {
                public function toResponse($request)
                {
                    // ここでLaravel Fortify標準のログイン画面、または自作のログイン画面を返す
                    return view('auth.login'); 
                }
            };
        });
    }
}