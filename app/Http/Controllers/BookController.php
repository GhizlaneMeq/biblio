<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('book.display', compact('books'));
    }


    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }


    public function create()
    {
        return view('book.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'description' => 'nullable|string',
            'deleted' => 'boolean',
            'publication_year' => 'nullable|date',
            'total_copies' => 'nullable|integer',
            'available_copies' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust allowed image types and size
        ]);

        // Handle image upload if provided
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        // Create a new book record
        $book = Book::create([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'genre' => $validatedData['genre'],
            'description' => $validatedData['description'],
            'deleted' => $validatedData['deleted'] ?? false,
            'publication_year' => $validatedData['publication_year'],
            'total_copies' => $validatedData['total_copies'],
            'available_copies' => $validatedData['available_copies'],
            'image' => $imagePath,
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }


    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'description' => 'nullable|string',
            'deleted' => 'boolean',
            'publication_year' => 'nullable|date',
            'total_copies' => 'nullable|integer',
            'available_copies' => 'nullable|integer',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $book->update([
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'genre' => $validatedData['genre'],
            'description' => $validatedData['description'],
            'deleted' => $validatedData['deleted'] ?? false,
            'publication_year' => $validatedData['publication_year'],
            'total_copies' => $validatedData['total_copies'],
            'available_copies' => $validatedData['available_copies'],
        ]);


        if ($request->hasFile('new_image')) {
            $newImagePath = $request->file('new_image')->store('books', 'public');
            $book->update(['image' => $newImagePath]);
        }

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }


}
