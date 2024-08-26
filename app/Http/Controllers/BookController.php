<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\BorrowedBook;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books',
            'copies_available' => 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'isbn' => 'required|unique:books,isbn,' . $book->id,
            'copies_available' => 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }
    public function borrow(Request $request, Book $book)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to borrow a book.');
        }
        $request->validate([
            'borrowed_at' => 'required|date',
            'return_due_at' => 'required|date|after:borrowed_at',
        ]);

        // Check if the book is available
        if ($book->copies_available <= 0) {
            return redirect()->route('books.index')->with('error', 'No copies available to borrow.');
        }
        BorrowedBook::create([
            'book_id' => $book->id,
            'user_id' => Auth::id(),
            'borrowed_at' => $request->input('borrowed_at'),
            'return_due_at' => $request->input('return_due_at'),
        ]);

        $book->decrement('copies_available');

        return redirect()->route('books.index')->with('success', 'Book borrowed successfully.');
    }
}
