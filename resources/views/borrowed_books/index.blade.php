@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrowed Books</h1>

    @if ($borrowedBooks->isEmpty())
        <div class="alert alert-info">
            No borrowed books found.
        </div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Book Title</th>
                    @if(Auth::user()->isAdmin())
                        <th>Borrower</th>
                    @endif
                    <th>Borrowed At</th>
                    <th>Return Due At</th>
                    <th>Status</th>
                    @if(Auth::check())
                        <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowedBooks as $borrowedBook)
                    <tr>
                        <td>{{ $borrowedBook->book->title }}</td>
                        @if(Auth::user()->isAdmin())
                            <td>{{ $borrowedBook->user->name }}</td>
                        @endif
                        <td>{{ $borrowedBook->borrowed_at->format('d-m-Y') }}</td>
                        <td>{{ $borrowedBook->return_due_at->format('d-m-Y') }}</td>
                        <td>
                            @if ($borrowedBook->returned_at)
                                <span class="badge bg-success">Returned</span>
                            @elseif(now()->greaterThan($borrowedBook->return_due_at))
                                <span class="badge bg-danger">Overdue</span>
                            @else
                                <span class="badge bg-warning text-dark">Borrowed</span>
                            @endif
                        </td>
                        <!--  <td> <a href="{{ route('borrowed_books.show', $borrowedBook->borrow_id) }}" class="btn btn-info btn-sm">View</a></td>
                        -->
                        <td>
                            @if(Auth::check() &&  Auth::user()->role === 'student'&& !$borrowedBook->returned_at)
                      
                                <form action="{{ route('borrowed_books.return', ['borrow_id' => $borrowedBook->borrow_id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Return Book</button>
                                </form>
                        @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>


    @endif
</div>
@endsection
