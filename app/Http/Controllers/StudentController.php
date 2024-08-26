<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $borrowedBooks = $user->borrowedBooks()->with('book')->get();

        return view('student.dashboard', [
            'borrowedBooks' => $borrowedBooks,
        ]);
    }
}
