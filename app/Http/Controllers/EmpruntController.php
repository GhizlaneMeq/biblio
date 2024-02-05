<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpruntRequest;
use App\Models\Emprunt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprunts = Emprunt::with(['user', 'book'])->get();
        return view('emprunts.display', compact('emprunts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emprunts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpruntRequest  $request)
    {

        /* $unreturnedBooks = Emprunt::where('user_id', $validatedData['user_id'])
            ->where('is_returned', 0)
            ->get();

        if ($unreturnedBooks->count() > 0) {
            return redirect()->back()->withErrors(['error' => 'You cannot borrow another book until you return your previous one.']);
        } */

        $emprunt = Emprunt::create($request->all());

        return redirect()->back()->with('success', 'Emprunt created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userBorrowedBooks()
    {
        $userId = Auth::id();

        $borrowedBooks = Emprunt::with('book')->where('user_id', $userId)->get();

        return view('emprunts.user_books', compact('borrowedBooks'));
    }
    
}
