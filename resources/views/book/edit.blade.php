@extends('layouts.dash')

@section('content')
    <style>
        .main-body {
            padding: 10px 10px 10px 20px;
            margin-left: 400px;
            margin-top: 150px
        }
    </style>
    <div class="main-body ml-16">
        <h1 class="text-2xl font-semibold mb-4">Edit Book</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 border border-green-600 px-4 py-2 rounded mb-4" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('books.update', $book->id) }}" method="post" class="bg-white  p-6 rounded shadow-md"   enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-600">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-sm font-medium text-gray-600">Genre</label>
                <input type="text" name="genre" id="genre" value="{{ old('genre', $book->genre) }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                <textarea name="description" id="description" class="mt-1 p-2 border rounded-md w-full">{{ old('description', $book->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="deleted" class="block text-sm font-medium text-gray-600">Deleted</label>
                <input type="checkbox" name="deleted" id="deleted" {{ old('deleted', $book->deleted) ? 'checked' : '' }}
                    class="mt-1">
            </div>

            <div class="mb-4">
                <label for="publication_year" class="block text-sm font-medium text-gray-600">Publication Year</label>
                <input type="date" name="publication_year" id="publication_year"
                    value="{{ old('publication_year', $book->publication_year) }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="total_copies" class="block text-sm font-medium text-gray-600">Total Copies</label>
                <input type="number" name="total_copies" id="total_copies"
                    value="{{ old('total_copies', $book->total_copies) }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="available_copies" class="block text-sm font-medium text-gray-600">Available Copies</label>
                <input type="number" name="available_copies" id="available_copies"
                    value="{{ old('available_copies', $book->available_copies) }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Current Image</label>
                @if($book->image)
                    <img src="{{/*  asset('storage/' . */ $book->image }}" alt="Image" class="mt-1 mb-2 rounded-md" style="max-width: 200px">
                @else
                    <p class="text-gray-500">No image available</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="new_image" class="block text-sm font-medium text-gray-600">New Image (Optional)</label>
                <input type="file" name="new_image" id="new_image" accept="image/*" class="mt-1 p-2 border rounded-md w-full">
            </div>



            <div class="flex items-center justify-between mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update
                    Book</button>
                <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-gray-700 ml-4">Cancel</a>
            </div>
        </form>
    </div>
@endsection
