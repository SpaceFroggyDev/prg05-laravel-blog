<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index']);
Route::resource('articles', ArticleController::class);
Route::resource('comments', CommentController::class);
Route::post('comments/{article}', [CommentController::class, 'store'])->name('comments.store');
Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::resource('/admin', AdminController::class)->middleware('auth');
Route::post('admin/toggle/{article}', [AdminController::class, 'toggle'])->name('admin.toggle');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
