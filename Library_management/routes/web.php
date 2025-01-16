<?php

use App\Http\Controllers\web\BookController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\TransactionController;
use App\Http\Controllers\web\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('authentication.login');
});

Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', function () {
    return view('authentication.login');
})->name('login');

Route::get('/register', function () {
    return view('authentication.register');
});
Route::post('/register', [LoginController::class, 'register']);

Route::middleware('web')->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/home', function () {
        return view('admin.home');
    })->name('home');
    
    Route::get('ushome', function () {
        return view('user.us_home');
    })->name('userhome');

    Route::get('/books', [BookController::class, 'index'])->name('ad_book.index');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('ad_book.destroy');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('ad_book.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('ad_book.update');
    Route::post('/books/store', [BookController::class, 'store'])->name('ad_book.store');
    Route::get('/books/create', function () {
        return view('admin.ad_book.create');
    })->name('ad_book.create');

    Route::get('/users', [UserController::class, 'index'])->name('ad_user.users');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('ad_user.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('ad_user.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('ad_user.destroy');
    Route::post('/users/store', [UserController::class, 'store'])->name('ad_user.store');
    Route::get('/users/create', function () {
        return view('admin.ad_user.create');
    })->name('ad_user.create');
    
    Route::get('/transactions', [TransactionController::class, 'index'])->name('ad_transaction.transactions');
    Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('ad_transaction.edit');
    Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('ad_transaction.update');
});
