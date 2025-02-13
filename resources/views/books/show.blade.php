<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <a href="{{ route('profile.edit') }}" class="btn btn-primary mt-3">Edit Profile</a>

    <div class="d-flex justify-content-between mb-4">
        <h1 class="text-primary">Book Details</h1>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
    
    <div class="card shadow p-4">
        <h2 class="text-center">{{ $book->title }}</h2>
        <p class="text-muted text-center">by {{ $book->author }}</p>
        <p class="text-center">Published Year: <strong>{{ $book->year }}</strong></p>
        
        <div class="text-center mt-3">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</body>
</html>