@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $book->title }}" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" id="author" value="{{ $book->author }}" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="isbn" value="{{ $book->isbn }}" required>
        </div>
        <div class="form-group">
            <label for="copies_available">Copies Available</label>
            <input type="number" name="copies_available" class="form-control" id="copies_available" value="{{ $book->copies_available }}" required>
        </div>
        <button type="submit" class="btn btn-primary" style="margin: 5px; background:#17888c;color:white;">Update</button>
    </form>
</div>
@endsection
