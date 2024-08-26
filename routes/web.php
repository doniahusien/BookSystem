<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowedBookController;
use App\Http\Controllers\UserController;


Auth::routes();


Route::get('/', function () {
    return redirect('/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'viewAllStudents'])->name('admin.users.index');
    Route::post('/admin/search-student', [AdminController::class, 'searchStudent'])->name('admin.searchStudent');
    Route::get('/admin/users/{id}', [AdminController::class, 'viewStudentDetails'])->name('admin.studentDetails');
    
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/borrowed_books', [BorrowedBookController::class, 'index'])->name('borrowed_books.index');
Route::get('/borrowed_books/{borrow_id}', [BorrowedBookController::class, 'show'])->name('borrowed_books.show');


// Student Routes
Route::middleware('student')->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::post('/books/{book}/borrow', [BookController::class, 'borrow'])->name('books.borrow');
    Route::post('/borrowed_books/{borrow_id}/return', [BorrowedBookController::class, 'return'])
        ->name('borrowed_books.return')
        ->where('borrow_id', '[0-9]+');
}
);

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});