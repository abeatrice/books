<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::redirect('/', '/books');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::resources([
        'books' => BookController::class,
    ]);
});
