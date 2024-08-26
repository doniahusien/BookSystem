@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>

        @if(session('success'))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; border-radius: 8px; padding: 10px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="name" style="font-size: 1rem; font-weight: 600; margin-bottom: 5px; display: block;">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required
                       style="border-radius: 10px; padding: 12px 15px; border: 1px solid #ced4da; font-size: 1rem; width: 100%;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="email" style="font-size: 1rem; font-weight: 600; margin-bottom: 5px; display: block;">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required
                       style="border-radius: 10px; padding: 12px 15px; border: 1px solid #ced4da; font-size: 1rem; width: 100%;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="password" style="font-size: 1rem; font-weight: 600; margin-bottom: 5px; display: block;">Password (leave blank to keep current password)</label>
                <input type="password" name="password" id="password" class="form-control"
                       style="border-radius: 10px; padding: 12px 15px; border: 1px solid #ced4da; font-size: 1rem; width: 100%;">
            </div>

            <div class="form-group" style="margin-bottom: 20px;">
                <label for="password_confirmation" style="font-size: 1rem; font-weight: 600; margin-bottom: 5px; display: block;">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                       style="border-radius: 10px; padding: 12px 15px; border: 1px solid #ced4da; font-size: 1rem; width: 100%;">
            </div>

            <button type="submit" style="background-color: #17888c; border: none; border-radius: 10px; padding: 12px 20px; font-size: 1rem; font-weight: bold; color: #ffffff; transition: background-color 0.3s ease;">
                Update Profile
            </button>
        </form>
    </div>
@endsection
