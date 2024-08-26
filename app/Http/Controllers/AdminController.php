<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\BorrowedBook;
use App\Models\Book;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function dashboard()
{
    $totalBooks = Book::count();
    $totalUsers = User::count();
    $totalBorrowedBooks = BorrowedBook::count();
  
    return view('admin.dashboard', compact('totalBooks', 'totalUsers', 'totalBorrowedBooks'));
}
    public function viewAllUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }


    public function viewAllStudents()
    {
        $students = User::where('role', 'student')->get();
        return view('admin.users.index', compact('students'));
    }

    public function searchStudent(Request $request)
    {
        $request->validate([
            'id' => 'nullable|integer',
        ]);
    
        if ($request->filled('id')) {
            $students = User::where('role', 'student')
                            ->where('id', $request->id)
                            ->get();
        } else {
            // Display all students if id is empty
            $students = User::where('role', 'student')->get();
        }
        return view('admin.users.index', compact('students'));
    }
    
public function viewStudentDetails($id)
{
    $student = User::where('role', 'student')
                   ->where('id', $id)
                   ->firstOrFail();
    return view('admin.users.details', compact('student'));
}
}
