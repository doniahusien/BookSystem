@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Details</h1>

        <div class="card">
            <div class="card-header">
                {{ $student->name }}
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Student ID:</strong> {{ $student->id }}</p>
                <p><strong>Registered At:</strong> {{ $student->created_at->format('Y-m-d') }}</p>
            
            </div>
        </div>
    </div>
@endsection

