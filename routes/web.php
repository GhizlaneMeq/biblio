<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::resource('books', BookController::class);
Route::get('borrowed-books', [EmpruntController::class, 'userBorrowedBooks']);
Route::resource('emprunts', EmpruntController::class);


Route::middleware(['auth', 'checkAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::resource('users', UserController::class);
    Route::resource('books', BookController::class)->except(['show']);
    Route::get('books.archive', [BookController::class, 'archive'])->name('books.archive');
    Route::post('/books/restore/{id}', [BookController::class, 'restore'])->name('books.restore');
    Route::resource('emprunts', EmpruntController::class)->except('store');

});

