<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\MylistController;

Route::get('/',[MoviesController::class, 'index'])->name('movies.index');

Route::get('/mylist', [MylistController::class, 'index'])->name('movies.mylist');

Route::get('/movies/{movies}',[MoviesController::class, 'show'])->name('movies.show');

Route::get('/movies/menu/{movies}',[FilterController::class, 'index'])->name('filter');

Route::get('/movies/watch/{movies}',[MoviesController::class, 'watch'])->name('movies.watch');

Route::get('/login', [AuthManager::class, 'login'])->name('login');

Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');

Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/profile/{profile_id}', [ProfileController::class, 'show'])->name('profile.show');

Route::post('/profile/{profile_id}', [ProfileController::class, 'update'])->name('profile.update');

Route::post('/mylist/add', [MylistController::class, 'add'])->name('mylist.add');

Route::get('/mylist/delete', [MylistController::class, 'delete'])->name('mylist.delete');


