<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CarrinhoController;
use PharIo\Manifest\Author;

/*
|--------------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|No caso abaixo chama-se o metodo index do controller
*/
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/adicionar-carrinho', [CarrinhoController::class, 'addCart'])->name('carrinho.add');
Route::get('/carrinho', [CarrinhoController::class, 'index'])->name('carrinho.index');
Route::get('/detalhes/{book}', [HomeController::class, 'show'])->name('home.show');
Route::resource('/books', BookController::class);
//Route::get('/', [BookController::class, 'index']);
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
// Route::get('/', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

// Route::post('/books', [BookController::class, 'store']);
