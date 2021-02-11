<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::redirect('/', '/books');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resources([
        'books' => BookController::class,
    ]);
    Route::post('/books/{book}/sort_order/{direction}', [BookController::class, 'changeSortOrder'])->name('books.changeSortOrder');
});
