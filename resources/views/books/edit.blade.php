<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>

    <div class="d-flex justify-content-between mb-4">
        <h1 class="text-primary">Edit Book</h1>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    
    <div class="card shadow p-4">
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="number" name="year" class="form-control" value="{{ $book->year }}" required>
            </div>
            
            <button type="submit" class="btn btn-success w-100">Update Book</button>
        </form>
    </div>
    
    <div class="mt-3 text-center">
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</body>
</html>
