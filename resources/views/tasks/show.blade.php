@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $task->title }}</h1>
    <p><strong>Description:</strong> {{ $task->description }}</p>
    <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
    <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
