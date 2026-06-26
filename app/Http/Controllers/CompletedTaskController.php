<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompletedTaskController extends Controller
{
    public function list()
    {
        
        $list = DB::table('completed_tasks')->get();

        // ビューにデータを渡す
        return view('task.completed_list', ['list' => $list]);
    }
}