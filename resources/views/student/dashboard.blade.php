@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Borrowed Books</h1>

    @if ($borrowedBooks->isEmpty())
        <div class="alert alert-info">
            You have not borrowed any books.
        </div>
    @else
        <ul class="list-group">
            @foreach ($borrowedBooks as $borrowedBook)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $borrowedBook->book->title }}</span>
                    @if (!$borrowedBook->returned_at)
                        <form action="{{ route('borrowed_books.return', ['borrow_id' => $borrowedBook->borrow_id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Return Book</button>
                        </form>
                    @else
                        <span class="badge bg-success">Returned</span>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
