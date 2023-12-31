<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use PharIo\Manifest\Author;

/*
|--------------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|No caso abaixo chama-se o metodo index do controller
*/
Route::resource('/books', BookController::class);
//Route::get('/', [BookController::class, 'index']);
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

// Route::post('/books', [BookController::class, 'store']);
