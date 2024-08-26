<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'copies_available',
    ];

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class, 'book_id');
    }
}
