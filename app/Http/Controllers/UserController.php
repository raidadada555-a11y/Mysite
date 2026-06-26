<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 登録画面を表示する処理
    public function index()
    {
        return view('user.register');
    }

    // データベースに登録する処理
    public function register(UserRegisterPost $request)
    {
        // バリデーションを通過したデータを取得
        $datum = $request->validated();

        // パスワードを暗号化（ハッシュ化）する
        $datum['password'] = Hash::make($datum['password']);

        // 登録日時と更新日時をセット
        $datum['created_at'] = now();
        $datum['updated_at'] = now();
        
        // usersテーブルに保存
        DB::table('users')->insert($datum);

        // トップページ（/）へ移動し、「登録されました」というメッセージを渡す
        return redirect('/')->with('front_message', '登録されました');
    }
}