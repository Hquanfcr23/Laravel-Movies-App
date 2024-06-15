<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/',[MoviesController::class, 'index'])->name('movies.index');
Route::get('/movies/{movies}',[MoviesController::class, 'show'])->name('movies.show');
Route::get('/movies/watch/{movies}',[MoviesController::class, 'watch'])->name('movies.watch');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');