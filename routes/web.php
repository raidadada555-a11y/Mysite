<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CompletedTaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

// トップページ（ログイン判定）
Route::get('/', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect('/task/list');
    }
    // 非ログイン時は welcome.blade.php を表示（ここに会員登録へのリンクを設置）
    return view('welcome');
});

// 会員登録関連
Route::get('/user/register', [UserController::class, 'index']);
Route::post('/user/register', [UserController::class, 'register']);

// 認証系（ログイン処理など）
// Auth::routes(); // ※環境に合わせて適宜追加してください

// タスク管理関連（ログイン必須）
Route::middleware(['auth'])->group(function () {
    Route::get('/task/list', [TaskController::class, 'list'])->name('task.list');
    // ...その他既存タスク関連のルート...
    
    // 完了タスク一覧
    Route::get('/completed_tasks/list', [CompletedTaskController::class, 'list'])->name('completed_tasks.list');
    Route::post('/task/complete/{id}', [TaskController::class, 'complete'])->name('task.complete');
});

// 管理画面
Route::get('/admin/index', [AdminController::class, 'index']);