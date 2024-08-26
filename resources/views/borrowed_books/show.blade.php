use Carbon\Carbon;

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-body p-4">
            <h2 class="card-title mb-4">Borrowed Book Details</h2>
            <hr>
            <p class="card-text"><strong>Book Title:</strong> {{ $borrowedBook->book->title }}</p>
            @if(Auth::user()->isAdmin())
                <p class="card-text"><strong>Borrower:</strong> {{ $borrowedBook->user->name }}</p>
                <p class="card-text"><strong>Borrower Email:</strong> {{ $borrowedBook->user->email }}</p>
            @endif
            <p class="card-text"><strong>Borrowed At:</strong> {{ Carbon::parse($borrowedBook->borrowed_at)->format('d-m-Y H:i') }}</p>
            <p class="card-text"><strong>Return Due At:</strong> {{ Carbon::parse($borrowedBook->return_due_at)->format('d-m-Y H:i') }}</p>
            <p class="card-text"><strong>Status:</strong>
                @if ($borrowedBook->returned_at)
                    <span class="badge bg-success">Returned on {{ Carbon::parse($borrowedBook->returned_at)->format('d-m-Y H:i') }}</span>
                @elseif(now()->greaterThan(Carbon::parse($borrowedBook->return_due_at)))
                    <span class="badge bg-danger">Overdue</span>
                @else
                    <span class="badge bg-warning text-dark">Borrowed</span>
                @endif
            </p>
            <div class="mt-4">
                <a href="{{ route('borrowed_books.index') }}" class="btn btn-outline-secondary">Back to List</a>
                @if(Auth::check() && Auth::user()->role === 'student' && !$borrowedBook->returned_at)
                    <form action="{{ route('borrowed_books.return', ['borrow_id' => $borrowedBook->borrow_id]) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary ml-2">Return Book</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
