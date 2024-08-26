@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Students</h1>

        <form action="{{ route('admin.searchStudent') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">Search by Student ID:</label>
                <input type="text" name="id" id="id" class="form-control" value="{{ request('id') }}">
            </div>
            <button type="submit" class="btn btn-primary" style="margin: 15px 0px; background:#17888c;color:white;">Search</button>
        </form>


        @if(isset($students))
            @if($students->isEmpty())
                <p>No students found.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Student ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->id }}</td>
                                <td>
                                    <a href="{{ route('admin.studentDetails', $student->id) }}" class="btn btn-info btn-sm">View Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        @endif
    </div>
@endsection
