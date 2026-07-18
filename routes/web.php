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
    return view('welcome');
})->name('front.index');

// 会員登録関連
Route::get('/user/register', [UserController::class, 'index']);
Route::post('/user/register', [UserController::class, 'register']);

// タスク管理関連（ログイン必須）
Route::middleware(['auth'])->group(function () {
    // タスク一覧
    Route::get('/task/list', [TaskController::class, 'list'])->name('task.list');
    
    // タスク登録用（Bladeの route('task.register') に対応）
    Route::post('/task/register', [TaskController::class, 'register'])->name('task.register');
    
    // タスク編集・削除など
    Route::get('/task/edit/{task_id}', [TaskController::class, 'edit'])->name('edit');
    Route::post('/task/editSave/{task_id}', [TaskController::class, 'editSave'])->name('editSave');
    Route::get('/task/detail/{task_id}', [TaskController::class, 'detail'])->name('detail');
    
    // 完了タスク一覧・完了処理
    Route::get('/completed_tasks/list', [CompletedTaskController::class, 'list'])->name('completed_tasks.list');
    Route::post('/task/complete/{id}', [TaskController::class, 'complete'])->name('task.complete');
});

// 管理画面
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');