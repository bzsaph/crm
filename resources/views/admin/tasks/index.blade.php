@extends('layouts.adminapp')

@section('content')
    <h1>Tasks for {{ $client->name }}</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{ $client->id }}">
        <input type="text" name="title" placeholder="Task Title" required>
        <textarea name="description" placeholder="Description"></textarea>
        <button type="submit">Add Task</button>
    </form>
    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->title }} - {{ $task->status }}</li>
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                <select name="status">
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                <button type="submit">Update Task</button>
            </form>
        @endforeach
    </ul>
@endsection
