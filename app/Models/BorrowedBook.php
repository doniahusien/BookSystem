<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedBook extends Model
{
    protected $table = 'borrowed_books';
    protected $primaryKey = 'borrow_id';
    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['book_id', 'user_id', 'borrowed_at', 'return_due_at', 'returned_at'];

    protected $dates = ['borrowed_at', 'return_due_at', 'returned_at'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
