<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
    body {
        font-family: 'Nunito', sans-serif;
        margin: 0;
        overflow-x: hidden;
        background-color: #e9ecef;
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #17888c; 
        color: #ffffff;
        padding-top: 20px;
        z-index: 1000;
    }

    .sidebar h4 {
        text-align: center;
        margin-bottom: 20px;
        color: #ffffff;
    }

    .sidebar a {
        display: block;
        color: #ffffff;
        padding: 15px;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
    }

    .sidebar a:hover {
        background-color: #005f6b; 
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }

    .navbar {
        margin-left: 250px;
    }

    @media (max-width: 991px) {
        .sidebar {
            display: none;
            position: relative;
            width: 100%;
            height: auto;
        }

        .sidebar.active {
            display: block;
        }

        .content {
            margin-left: 0;
        }

        .navbar {
            margin-left: 0;
        }

        .sidebar-toggle {
            display: block;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1001;
            background-color: #17888c; 
            color: #ffffff;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
    }
</style>

</head>

<body>
    <div id="app">
        <div class="sidebar" id="sidebar">
            @if(Auth::user())
            <h4>{{
             Auth::user()->name 
           }}</h4>
            @endif
            @if(Auth::user()->is_admin)
  
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('profile.edit') }}">Edit Profile</a>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('borrowed_books.index') }}">Borrowed Books</a>
            <a href="{{ route('admin.users.index') }}">All Users</a>
            @else
            <!-- Student Sidebar Links -->
            <a href="{{ route('student.dashboard') }}">Dashboard</a>
            <a href="{{ route('profile.edit') }}">Edit Profile</a>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('borrowed_books.index') }}">Borrowed Books</a>
            @endif
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

        <div class="content">
        
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>