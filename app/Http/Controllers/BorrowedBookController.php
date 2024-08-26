<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Support\Facades\Auth;

class BorrowedBookController extends Controller
{public function index()
    {
        if (Auth::user()->isAdmin()) {
            // Show all borrowed books
            $borrowedBooks = BorrowedBook::with('book', 'user')->get()->map(function ($borrowedBook) {
                $borrowedBook->borrowed_at = Carbon::parse($borrowedBook->borrowed_at);
                $borrowedBook->return_due_at = Carbon::parse($borrowedBook->return_due_at);
                $borrowedBook->returned_at = $borrowedBook->returned_at ? Carbon::parse($borrowedBook->returned_at) : null;
                return $borrowedBook;
            });
            return view('borrowed_books.index', compact('borrowedBooks'));
        } else {
            //Show only borrowed books of the user
            $borrowedBooks = BorrowedBook::where('user_id', Auth::id())->with('book')->get()->map(function ($borrowedBook) {
                $borrowedBook->borrowed_at = Carbon::parse($borrowedBook->borrowed_at);
                $borrowedBook->return_due_at = Carbon::parse($borrowedBook->return_due_at);
                $borrowedBook->returned_at = $borrowedBook->returned_at ? Carbon::parse($borrowedBook->returned_at) : null;
                return $borrowedBook;
            });
            return view('borrowed_books.index', compact('borrowedBooks'));
        }
    }

    public function show($borrow_id)
    {
        $borrowedBook = BorrowedBook::where('borrow_id', $borrow_id)->firstOrFail();
        return view('borrowed_books.show', compact('borrowedBook'));
    }
    
    public function return($borrow_id)
    {
        $borrowedBook = BorrowedBook::where('borrow_id', $borrow_id)->firstOrFail();
        $borrowedBook->returned_at = now(); // return date = the current date
        $borrowedBook->save();
    
        $book = $borrowedBook->book;
        $book->increment('copies_available');
    
        return redirect()->route('borrowed_books.index')->with('success', 'Book returned successfully.');
    }
    
}
