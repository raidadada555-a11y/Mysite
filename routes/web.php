<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CompletedTaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;


Route::get('/user/register', [UserController::class, 'index']);
Route::post('/user/register', [UserController::class, 'register']);


Route::get("/", [UserController::class, "index"])->name("front.index");


Route::middleware(["auth"])->group(function () {
    Route::prefix("/task")->group(function () {
        Route::get("/list", [TaskController::class, "list"]);
        Route::post("/register", [TaskController::class, "register"]);
        Route::get("/detail/{task_id}", [TaskController::class, "detail"])->whereNumber("task_id")->name("detail");
        Route::get("/edit/{task_id}", [TaskController::class, "edit"])->whereNumber("task_id")->name("edit");
        Route::put("/edit/{task_id}", [TaskController::class, "editSave"])->whereNumber("task_id")->name("edit_save");
        Route::delete("/delete/{task_id}", [TaskController::class, "delete"])->whereNumber("task_id")->name("delete");
        Route::post("/complete/{task_id}", [TaskController::class, "complete"])->whereNumber("task_id")->name("complete");
        Route::get("/csv/download", [TaskController::class, "csvDownload"]);
    });

  
    Route::get('/completed_tasks/list', [CompletedTaskController::class, 'list']);
});


Route::prefix("/admin")->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->name('admin.index');
    Route::post("/login", [AdminAuthController::class, "login"])->name("admin.login");
    
    Route::middleware(["auth:admin"])->group(function () {
        Route::get("/top", [AdminHomeController::class, "top"])->name("admin.top");
        Route::get("/logout", [AdminAuthController::class, "logout"]);
    });
});


Route::get("/welcome", [WelcomeController::class, "index"]);
Route::get("/welcome/second", [WelcomeController::class, "second"]);
Route::get("/test", [TestController::class, "index"]);
Route::post("/test/input", [TestController::class, "input"]);