<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'date_emprunt',
        'return_date',
        'is_returned',
        'user_id',
        'book_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class)->withTrashed(); // Include trashed books if needed
    }


    protected static function booted(): void
    {
        static::created(function (Emprunt $emprunt) {
            $emprunt->book->decrement('available_copies');
        });
    }
}
