<!DOCTYPE html>
<html lang="en">
<head>
    <title>Books List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <form action="{{ route('auth.logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    @if (session()->has('user'))
    <form action="{{ route('auth.logout') }}" method="POST">
        @csrf  <!-- CSRF token to protect against CSRF attacks -->
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    @endif
    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>


    <h1 class="text-center mb-4">Library - Books List</h1>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Go to Users</a>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
