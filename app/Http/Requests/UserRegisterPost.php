<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterPost extends FormRequest
{
    public function authorize()
    {
        return true; // 誰でも使えるように true にします
    }

    public function rules()
    {
        return [
            'name'     => ['required', 'string', 'max:128'],
            'email'    => ['required', 'string', 'email', 'max:254', 'unique:users,email'],
            'password' => ['required', 'string', 'max:72'],
        ];
    }
}