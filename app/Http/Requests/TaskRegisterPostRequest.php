<?php

namespace App\Http\Controllers;

// 1. 👈 ここに以下の一行を追加して、作ったリクエストクラスを読み込みます
use App\Http\Requests\TaskRegisterPostRequest; 
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * タスク登録処理
     * 
     * 2. 👈 引数の型を「Request」から「TaskRegisterPostRequest」に変更します
     */
    public function register(TaskRegisterPostRequest $request)
    {
        // ここに到達した時点で、自動的にバリデーション（入力チェック）が実行され、
        // エラーがなければ通過しています！
        
        // チェック済みのデータを取得する場合
        $validated = $request->validated();

        // (この後にデータベースへの保存処理などを書いていきます)
        return view('task.list'); 
    }
}
