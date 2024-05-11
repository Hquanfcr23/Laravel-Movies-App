<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/',[MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movies}',[MoviesController::class, 'show'])->name('movies.show');