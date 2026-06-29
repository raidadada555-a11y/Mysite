<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスク管理 アプリケーション</title>
    <style>
        body { font-family: sans-serif; text-align: center; margin-top: 50px; }
        .alert-success { display: inline-block; padding: 15px 30px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; font-weight: bold; margin-bottom: 20px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #3498db; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; margin-top: 20px; }
    </style>
</head>
<body>

    <h1>タスク管理 アプリケーション</h1>

    <!-- 登録完了メッセージの表示エリア -->
    @if (session('message'))
        <div class="alert-success">
            {{ session('message') }}
        </div>
    @else
        <p>課題の修正がすべて完了しました！</p>
        <div>
            <a href="/user/register" class="btn">👤 新規会員登録はこちら</a>
        </div>
    @endif

</body>
</html>