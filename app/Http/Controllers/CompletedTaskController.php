<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // 追加

class CompletedTaskController extends Controller
{
    /**
     * 完了タスク一覧を表示する
     */
    public function list()
    {
        // ログイン中のユーザーIDで絞り込んで取得
        $completedTasks = DB::table('completed_tasks')
                            ->where('user_id', Auth::id())
                            ->get();

        // resources/views/task/completed_list.blade.php を表示
        return view('task.completed_list', compact('completedTasks'));
    }
}
