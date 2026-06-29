<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompletedTaskController extends Controller
{
    /**
     * 完了タスク一覧を表示する
     */
    public function list()
    {
        // completed_tasks テーブルからデータを全件取得
        $completedTasks = DB::table('completed_tasks')->get();

        // resources/views/task/completed_list.blade.php を正しく表示
        return view('task.completed_list', compact('completedTasks'));
    }
}