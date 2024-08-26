@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="mb-4">Admin Dashboard</h1>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Books</h5>
                        <p class="card-text">{{ $totalBooks }}</p>
                        <a href="{{ route('books.index') }}" class="btn btn-light">View Books</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">{{ $totalUsers }}</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light">View Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Borrowed Books</h5>
                        <p class="card-text">{{ $totalBorrowedBooks }}</p>
                        <a href="{{ route('borrowed_books.index') }}" class="btn btn-light">View Borrowed Books</a>
                    </div>
                </div>
            </div>
        </div>

       
    </div>
@endsection
