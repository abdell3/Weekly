<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CategoryController;
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
    
    Route::get('/category', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::resource('category', CategoryController::class);
    // Route::get('/category/{slug}', [CategoryController::class, 'showBySlug']);
   
   
    Route::get('/announcement/{annonce}', [AnnouncementController::class, 'show'])->name('announcement.show');
    Route::patch('/announcement', [AnnouncementController::class, 'update'])->name('announcement.update');
    Route::delete('/announcement', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
    Route::resource('announcement', AnnouncementController::class);

}


);

require __DIR__.'/auth.php';
