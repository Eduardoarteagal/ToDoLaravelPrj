<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Categories</h1>
    <a href="{{ route('tasks.index') }}" class="btn btn-success">Go to Tasks</a>
    @if(session('error_associated'))
    <div class="alert alert-danger mt-4">
        {{ session('error_associated') }}
    </div>
    @endif
    <ul class="list-group">
        @foreach($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $category->name }}

                <div class="btn-group" role="group">
                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post" onsubmit="return confirmDelete('{{ $category->name }}')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>

<div class="container mt-4">
    <h1>Create Category</h1>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name:</label>
            <input type="text" class="form-control" name="name" id="name" required>
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function confirmDelete(categoryName) {
        return confirm('Are you sure you want to delete the category "' + categoryName + '"? This action cannot be undone.');
    }
</script>

</body>
</html>
