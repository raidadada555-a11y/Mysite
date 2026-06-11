<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [AuthController::class, 'index'])->name('front.index');
Route::post('/login', [AuthController::class, 'login']);

// 認可処理（ここを差し替えました！）
Route::middleware(['auth'])->group(function () {
    Route::get('/task/list', [TaskController::class, 'list']);
    Route::post('/task/register', [TaskController::class, 'register']);
    Route::get('/logout', [AuthController::class, 'logout']);
});