@extends('test.layout')

{{-- メインコンテンツ --}}
@section('contents')
        <form action="/test/input" method="post">
            @csrf
            email：<input type="text" name="email"><br>
            パスワード：<input type="password" name="password"><br>
            <button>送信する</button>
        </form>
@endsection    

{{-- 登録完了メッセージの出力（登録が成功するとここに緑色で表示されます） --}}
@if (session('front_message'))
    <div style="color: green; font-weight: bold; margin-bottom: 15px;">
        {{ session('front_message') }}
    </div>
@endif

{{-- 会員登録画面へのリンク --}}
<a href="/user/register" style="display: inline-block; margin-bottom: 15px;">会員登録（新規作成）はこちら</a>