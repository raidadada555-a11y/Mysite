<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>タスク一覧</title>
</head>
<body>
    <h1>タスク一覧</h1>

    <!-- 完了タスク一覧へのリンク -->
    <a href="{{ route('completed_tasks.list') }}">完了タスク一覧</a>

    <hr>

    <!-- タスクのリスト表示 -->
    <ul>
        @foreach($list as $task)
            <li>
                {{ $task->name }}
                <!-- 完了ボタン -->
                <form action="{{ route('task.complete', ['id' => $task->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">完了にする</button>
                </form>
            </li>
        @endforeach
    </ul>
    
    <!-- ページネーションの表示 -->
    {{ $list->links() }}
</body>
</html>