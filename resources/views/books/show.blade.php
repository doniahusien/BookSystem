@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="card-title mb-3">{{ $book->title }}</h2>
                    <p class="card-text text-muted mb-2"><strong>Author:</strong> {{ $book->author }}</p>
                    <p class="card-text text-muted mb-2"><strong>ISBN:</strong> {{ $book->isbn }}</p>
                    <p class="card-text text-muted mb-4"><strong>Copies Available:</strong> {{ $book->copies_available }}</p>
                    <div class="text-right">
                        <a href="{{ route('books.index') }}" class="btn btn-lg" style="background:#17888c; color:white;">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
