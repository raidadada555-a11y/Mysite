<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authを使うために必須

class AuthController extends Controller
{
    /**
     * ログイン処理
     */
    public function login(LoginPostRequest $request)
    {
        // validate済のデータを取得
        $datum = $request->validated();

        // 認証の成否を確認
        if (Auth::attempt($datum)) {
            // ログイン成功：セッション固定攻撃の回避
            $request->session()->regenerate();

            // ログイン後のTopPageへリダイレクト
            return redirect()->intended('/task/list');
        }

        // ログイン失敗：元のページに戻し、入力値を保持してエラーメッセージを出力
        return back()
               ->withInput()
               ->withErrors(['auth' => 'emailかパスワードに誤りがあります。']);
    }
}