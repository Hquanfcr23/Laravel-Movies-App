<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

Route::get('/',[MoviesController::class, 'index'])->name('movies.index');
Route::get('/mylist', [MoviesController::class, 'mylist'])->name('movies.mylist');
Route::get('/mylist/add/{movies}', [MoviesController::class, 'addToMyList'])->name('movies.addToMyList');
Route::get('/mylist/remove/{movies}', [MoviesController::class, 'removeToMyList'])->name('movies.removeToMyList');
Route::get('/movies/{movies}',[MoviesController::class, 'show'])->name('movies.show');
Route::get('/movie/{movies}',[MoviesController::class, 'shows'])->name('movies.shows');
Route::get('/movies/watch/{movies}',[MoviesController::class, 'watch'])->name('movies.watch');
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/profile/{profile_id}', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/{profile_id}', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/movies/{movies}', [CommentController::class, 'post'])->name('Comment.post');

