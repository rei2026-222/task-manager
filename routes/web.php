<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// ログイン画面へリダイレクト
Route::get('/', function () {
    return redirect()->route('login');
});

// 認証が必要なルート
Route::middleware('auth')->group(function () {

    // カテゴリーのCRUDルート
    Route::resource('categories', CategoryController::class);

    // タスク一覧（仮ルート）
    Route::get('/tasks', function () {
        return 'タスク一覧（準備中）';
    })->name('tasks.index');

});