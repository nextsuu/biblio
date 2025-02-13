<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;

// Authentication routes
Route::get('login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('auth.register');
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');

// Book routes
Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::get('books/create', [BookController::class, 'create'])->name('books.create');
Route::post('books', [BookController::class, 'store'])->name('books.store');
Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');