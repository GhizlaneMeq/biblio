<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Emprunt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunt::with(['user', 'book'])->get();

        return view('emprunts.display', compact('emprunts'));
    }

    public function create()
    {

        return view('emprunts.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'nullable|string',
            'date_emprunt' => 'required|date',
            'return_date' => 'nullable|date',
            'is_returned' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);

        $unreturnedBooks = Emprunt::where('user_id', $validatedData['user_id'])
            ->where('is_returned', 0)
            ->get();

        if ($unreturnedBooks->count() > 0) {
            return redirect()->back()->withErrors(['error' => 'You cannot borrow another book until you return your previous one.']);


        }

        $emprunt = Emprunt::create($validatedData);

        $book = Book::find($validatedData['book_id']);

        $book->decrement('available_copies');
        return redirect()->route('emprunts.index')->with('success', 'Emprunt created successfully.');
    }

    public function update(Request $request, Emprunt $emprunt)
    {
        $request->validate([
            'description' => 'required|string',
        ]);
        $emprunt->update([
            'is_returned' => 1,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('emprunts.index')->with('success', 'Status updated successfully.');
    }





    public function userBorrowedBooks()
    {
        $userId = Auth::id();

        $borrowedBooks = Emprunt::with(['book'])
            ->where('user_id', $userId)
            ->get();

        return view('emprunts.user_books', compact('borrowedBooks'));
    }
}




