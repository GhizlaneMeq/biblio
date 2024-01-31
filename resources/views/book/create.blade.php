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

        @if ($errors->any())
            <div class="bg-red-200 text-red-800 border border-red-600 px-4 py-2 rounded mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('books.store') }}" method="post" class="bg-white p-6 rounded shadow-md"
            enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-600">Author</label>
                <input type="text" name="author" id="author" value="{{ old('author') }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="genre" class="block text-sm font-medium text-gray-600">Genre</label>
                <input type="text" name="genre" id="genre" value="{{ old('genre') }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                <textarea name="description" id="description" class="mt-1 p-2 border rounded-md w-full">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="deleted" class="block text-sm font-medium text-gray-600">Deleted</label>
                <input type="checkbox" name="deleted" id="deleted" {{ old('deleted') ? 'checked' : '' }} class="mt-1">
            </div>

            <div class="mb-4">
                <label for="publication_year" class="block text-sm font-medium text-gray-600">Publication Year</label>
                <input type="date" name="publication_year" id="publication_year" value="{{ old('publication_year') }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="total_copies" class="block text-sm font-medium text-gray-600">Total Copies</label>
                <input type="number" name="total_copies" id="total_copies" value="{{ old('total_copies') }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="available_copies" class="block text-sm font-medium text-gray-600">Available Copies</label>
                <input type="number" name="available_copies" id="available_copies" value="{{ old('available_copies') }}"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create
                    Book</button>
                <a href="{{ route('books.index') }}" class="text-gray-500 hover:text-gray-700 ml-4">Cancel</a>
            </div>
        </form>


    </div>
@endsection
