<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Librery</title>
</head>

<body>
    <div class="container mx-auto p-8">
        <h1>Your Borrowed Books</h1>
        @if ($borrowedBooks->isEmpty())
            <p>You have not borrowed any books.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Borrowed Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($borrowedBooks as $emprunt)
                        <tr>
                            <td>{{ $emprunt->book->title }}</td>
                            <td>{{ $emprunt->date_emprunt}}</td>
                            <td>
                                @if ($emprunt->is_returned)
                                    Returned
                                @else
                                    Not Returned
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>

</html>
