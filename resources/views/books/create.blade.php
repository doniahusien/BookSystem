@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Book</h1>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" id="author" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" name="isbn" class="form-control" id="isbn" required>
        </div>
        <div class="form-group">
            <label for="copies_available">Copies Available</label>
            <input type="number" name="copies_available" class="form-control" id="copies_available" required>
        </div>
        <button type="submit" class="btn btn-primary" style="margin: 5px; background:#17888c;color:white;">Save</button>
    </form>
</div>
@endsection
