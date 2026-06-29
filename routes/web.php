<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. トップページ（登録メッセージがあるかどうかで画面を切り替えます）
Route::get('/', function () {
    // 会員登録コントローラーから「登録されました」というメッセージが届いているか確認
    $message = session('message');

    if ($message) {
        // 登録完了後に戻ってきたときの画面
        return '
            <div style="text-align: center; margin-top: 50px; font-family: sans-serif;">
                <h1>タスク管理 アプリケーション</h1>
                <div style="display: inline-block; padding: 15px 30px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; font-weight: bold; margin-bottom: 20px;">
                    ' . e($message) . '
                </div>
            </div>
        ';
    }

    // まだ登録していない、最初の状態の画面
    return '
        <div style="text-align: center; margin-top: 50px; font-family: sans-serif;">
            <h1>タスク管理 アプリケーション</h1>
            <div style="margin-top: 30px;">
                <a href="/user/register" style="display: inline-block; padding: 10px 20px; background-color: #3498db; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">
                    👤 新規会員登録はこちら
                </a>
            </div>
        </div>
    ';
});

// 2. 会員登録関連
Route::get('/user/register', 'App\Http\Controllers\UserController@index');
Route::post('/user/register', 'App\Http\Controllers\UserController@register');

// 3. 完了タスク一覧関連
Route::get('/completed_tasks/list', 'App\Http\Controllers\CompletedTaskController@list');