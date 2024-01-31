<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container mx-auto p-8">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-4">
                    @if ($book->image)
                        <img src="{{-- {{ asset('storage/' . $book->image) }} --}}https://images.pexels.com/photos/46274/pexels-photo-46274.jpeg?auto=compress&cs=tinysrgb&w=600"
                            alt="Book Cover" class="img-fluid">
                    @else
                        <div class="bg-gray-300 h-100"></div>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $book->title }}</h2>
                        <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                        <p class="card-text"><strong>Genre:</strong> {{ $book->genre }}</p>
                        <p class="card-text"><strong>Description:</strong> {{ $book->description }}</p>
                        <p class="card-text"><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
                        <p class="card-text"><strong>Total Copies:</strong> {{ $book->total_copies }}</p>
                        <p class="card-text"><strong>Available Copies:</strong> {{ $book->available_copies }}</p>
                        @auth
                            <form method="post" action="{{ route('emprunts.store') }}">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="date_emprunt" value="{{ now() }}">

                                <button type="submit" class="btn btn-primary">Borrow</button>
                            </form>
                        @else
                            <p class="text-muted">Login to borrow this book</p>
                            <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                        @endauth
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
