<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return redirect(app()->getLocale());
});


Route::prefix('{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('setlocale')
    ->group(function() {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::prefix('books')->group(function() {
            Route::get('/create', [BookController::class, 'create'])->name('books.create');

            Route::get('/index', [BookController::class, 'index'])->name('books.index');

            Route::get('/mybooks', [BookController::class, 'mybooks'])->name('books.mybooks');

            Route::post('/store', [BookController::class, 'store'])->name('books.store');

            Route::get('/show/{id}', [BookController::class, 'show'])->name('books.show');

            Route::get('/destroy/{id}', [BookController::class, 'destroy'])->name('books.destroy');

            Route::get('/search', [BookController::class, 'search'])->name('books.search');

        });

        Route::prefix('categories')->group(function() {

            Route::get('/show/{id}', [CategoryController::class, 'show'])->name('categories.show');

        });

    Auth::routes();
});





