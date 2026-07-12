@extends('layouts.app')

@section('content')
<div class="container">
    <h1>完了タスク一覧</h1>
    <table class="table">
        <thead>
            <tr>
                <th>タスク名</th>
                <th>期限</th>
                <th>重要度</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach($completedTasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->due_date }}</td>
                <td>{{ $task->priority }}</td>
                <td>{{ $task->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
