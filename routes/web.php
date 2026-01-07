<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Image Gallery Routes
|--------------------------------------------------------------------------
*/

// Gallery routes
Route::get('/gallery', [ImageController::class, 'index'])->name('gallery.index');
Route::get('/gallery/create', [ImageController::class, 'create'])->name('gallery.create');
Route::post('/gallery', [ImageController::class, 'store'])->name('gallery.store');
Route::delete('/gallery/{id}', [ImageController::class, 'destroy'])->name('gallery.destroy');
