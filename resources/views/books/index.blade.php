@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Books</h1>
    @if (Auth::check() && Auth::user()->role=="admin") 
        <a href="{{ route('books.create') }}" class="btn btn-primary" style="margin-bottom: 8px; background:#17888c;color:white;">Add New Book</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Copies Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->copies_available }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                    @if (Auth::check())
                        <form action="{{ route('books.borrow', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <input type="hidden" name="borrowed_at" value="{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}">
                            <input type="hidden" name="return_due_at" value="{{ \Carbon\Carbon::now()->addDays(14)->format('Y-m-d H:i:s') }}">
                            @if (Auth::user() && Auth::user()->role === 'student')
                            <button type="submit" style="margin: 5px; background:#17888c;color:white;" class="btn btn-sm">Borrow</button>
                        @endif
                        </form>
                    @endif
                    @if (Auth::user() && Auth::user()->role === 'admin')
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline; margin-left:5px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
