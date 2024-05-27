<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;

Route::get( '/', Home::class)->middleware( middleware: 'auth');
Route::get('/profile/{username}', 'ProfileController@home')->name('profile.home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/explore', function () {
    return view('explore');
})->name('explore');

Route::get('/reels', function () {
    return view('reels');
})->name('reels');


require __DIR__.'/auth.php';
