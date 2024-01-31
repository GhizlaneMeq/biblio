<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';
    protected $fillable = [
        'title',
        'author',
        'genre',
        'description',
        'publication_year',
        'total_copies',
        'available_copies',
        'image',
    ];

    protected $dates = ['deleted_at']; 

    public function emprunts()
    {
        return $this->hasMany(Emprunt::class);
    }
}
