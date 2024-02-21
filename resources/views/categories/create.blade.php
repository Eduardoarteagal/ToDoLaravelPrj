

    <h1>Create Category</h1>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" required>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">Add Category</button>
    </form>
