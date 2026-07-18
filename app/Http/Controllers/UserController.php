<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterPost; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // ★ここを追加

class UserController extends Controller
{
    /**
     * 会員登録画面を表示する
     */
    public function index()
    {
        return view('user.register');
    }

    /**
     * 会員登録処理を行う
     */
    public function register(UserRegisterPost $request)
    {
        // バリデーション済みのデータを取得
        $datum = $request->validated();

        // パスワードのハッシュ化
        $datum['password'] = Hash::make($datum['password']);
        
        // created_at, updated_at を追加
        $datum['created_at'] = now();
        $datum['updated_at'] = now();

        // データベース（usersテーブル）に保存してユーザーIDを取得
        $userId = DB::table('users')->insertGetId($datum);

        // ★重要：登録したユーザーを自動的にログインさせる
        $user = \App\Models\User::find($userId);
        Auth::login($user);

        return redirect('/')->with('message', '会員登録されました。');
    }
}