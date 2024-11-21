<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [PostController::class, 'viewDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');


Route::get('/profile', [ProfileController::class, 'edit']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('post', PostController::class);

require __DIR__.'/auth.php';
