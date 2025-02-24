<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::resource('category', CategoryController::class);
    // Route::get('/category/{slug}', [CategoryController::class, 'showBySlug']);
   
   
    Route::get('/announcement/{annonce}', [AnnouncementController::class, 'show'])->name('announcement.show');
    Route::patch('/announcement', [AnnouncementController::class, 'update'])->name('announcement.update');
    Route::delete('/announcement', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
    Route::resource('announcement', AnnouncementController::class);



    Route::get('/annonces/{annonce}/Comments', [CommentController::class, 'index'])->name('Comments.index');
    Route::get('/Comments/{Comment}', [CommentController::class, 'show'])->name('Comments.show');
    Route::get('/annonces/{annonce}/Comments/create', [CommentController::class, 'create'])->name('Comments.create');
    Route::post('/annonces/{annonce}/Comments', [CommentController::class, 'store'])->name('Comments.store');
    Route::get('/Comments/{Comment}/edit', [CommentController::class, 'edit'])->name('Comments.edit');
    Route::put('/Comments/{Comment}', [CommentController::class, 'update'])->name('Comments.update');
    Route::delete('/Comments/{Comment}', [CommentController::class, 'destroy'])->name('Comments.destroy');
}


);

require __DIR__.'/auth.php';
