@extends('layouts.app')

@section('content')
<div class="container">
    <h1>タスク一覧</h1>
    
    {{-- 完了タスク一覧へのリンクを追加 --}}
    <div class="mb-3">
        <a href="/completed_tasks/list" class="btn btn-secondary">完了タスク一覧を見る</a>
    </div>

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>タスク名</th>
                <th>期限</th>
                <th>重要度</th>
                <th>詳細</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->period }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->detail }}</td>
                <td>
                    {{-- 完了ボタン（Patchメソッドを使用） --}}
                    <form action="{{ route('task.complete', ['id' => $task->id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-primary btn-sm">完了にする</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- ページネーションのリンク --}}
    {{ $list->links() }}
</div>
@endsection
