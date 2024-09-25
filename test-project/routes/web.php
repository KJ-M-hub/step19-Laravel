<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::resource('post', PostController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])
->middleware(['auth'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('post', [PostController::class, 'index'])
// ->name('post.index');

// Route::get('post/show/{post}', [PostController::class, 'show'])
// ->name('post.show');

// Route::get('/post/create', [PostController::class, 'create']);

// Route::get('post/{post}/edit', [PostController::class, 'edit'])
// ->name('post.edit');

// Route::patch('post/{post}', [PostController::class, 'update'])
// ->name('post.update');

// Route::post('post', [PostController::class, 'store'])
// ->name('post.store');

// Route::delete('post/{post}', [PostController::class, 'destroy'])
// ->name('post.destroy');
require __DIR__.'/auth.php';
