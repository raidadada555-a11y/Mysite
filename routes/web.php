// 1. トップページ
Route::get('/', function () {
    // ログイン済みならタスク一覧へリダイレクト
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect('/task/list');
    }

    $message = session('message');

    if ($message) {
        return '
            <div style="text-align: center; margin-top: 50px; font-family: sans-serif;">
                <h1>タスク管理 アプリケーション</h1>
                <div style="display: inline-block; padding: 15px 30px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; font-weight: bold; margin-bottom: 20px;">
                    ' . e($message) . '
                </div>
            </div>
        ';
    }

    return '
        <div style="text-align: center; margin-top: 50px; font-family: sans-serif;">
            <h1>タスク管理 アプリケーション</h1>
            <div style="margin-top: 30px;">
                <a href="/user/register" style="display: inline-block; padding: 10px 20px; background-color: #3498db; color: white; text-decoration: none; border-radius: 4px; font-weight: bold;">
                    👤 新規会員登録はこちら
                </a>
            </div>
        </div>
    ';
});