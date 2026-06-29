<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
    public function register(Request $request)
    {
        // 入力値のバリデーション（チェック）
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // データベース（usersテーブル）に保存
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ✨ここが超重要：トップページ（/）に戻りつつ、メッセージを確実に渡します
        return redirect('/')->with('message', '会員登録されました。');
    }
}