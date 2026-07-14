<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRegisterPost; 
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

    public function register(UserRegisterPost $request)
    {
        
        $validated = $request->validated();

        // データベースに保存
        DB::table('users')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/')->with('message', '会員登録されました。');
    }
}