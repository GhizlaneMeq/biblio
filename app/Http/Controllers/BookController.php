<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.display', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->all());
        if ($request->hasFile('image')) {
            $book->image = $request->file('image')->store('books', 'public');
        }
        return redirect('/books')->with('success','Book has been  added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->all());
        if ($request->hasFile('image')) {
            $book->image = $request->file('image')->store('books', 'public');
        }
        return redirect('/books')->with('success','book has been updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books')->with('success','book has been deleted successfuly');
    }
    public function archive(){
        $books = Book::onlyTrashed()->get();
        return view('book.Archive',compact('books'));
    }


    public function restore($id)
    {
        $book = Book::withTrashed()->findOrFail($id);
        $book->restore();
        return redirect('/books/archive')->with('success', 'Book has been restored successfully');
    }

}
