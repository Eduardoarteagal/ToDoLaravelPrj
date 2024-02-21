<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Tasks</h1>
    <div class="mt-4">
        <a href="{{ route('categories.index') }}" class="btn btn-success">Go to Categories</a>
    </div>
    <br>
    <ul class="list-group">
        @forelse($tasks as $task)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $task->name }}</strong> - {{ $task->description }}
                    </div>
                    <div>
                        <span class="badge bg-secondary">{{ $task->category->name }}</span>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning me-2">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this task?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
        @empty
            <li class="list-group-item">No tasks available.</li>
        @endforelse
    </ul>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mt-3">Create Task</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
