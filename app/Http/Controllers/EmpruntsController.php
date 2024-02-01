<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpruntRequest;
use App\Models\Book;
use App\Models\Emprunt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpruntController extends Controller
{





   





    public function userBorrowedBooks()
    {
        $userId = Auth::id();

        $borrowedBooks = Emprunt::with(['book'])
            ->where('user_id', $userId)
            ->get();

        return view('emprunts.user_books', compact('borrowedBooks'));
    }
}




