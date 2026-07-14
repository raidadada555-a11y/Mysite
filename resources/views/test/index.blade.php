@extends('test.layout')

{{-- メインコンテンツ --}}
@section('contents')
    <div class="container mt-4">
        
        {{-- 登録完了メッセージ --}}
        @if (session('front_message'))
            <div class="alert alert-success">
                {{ session('front_message') }}
            </div>
        @endif

        <h1>ログイン</h1>
        <form action="/test/input" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email：</label>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">パスワード：</label>
                <input type="password" name="password" class="form-control">
            </div>
            <button class="btn btn-primary">送信する</button>
        </form>

        <div class="mt-3">
            <a href="/user/register" class="text-decoration-none">会員登録（新規作成）はこちら</a>
        </div>
    </div>
@endsection