<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get( uri:'/',action: Home::class)->middleware( middleware: 'auth');


Route::get(uri: '/dashboard', action: function () {
    return view(view: 'dashboard');
})->middleware(['auth', 'verified'])->name(name: 'dashboard');


Route::middleware('auth')->group(function () {
    Route::get(uri: '/profile',action: [ProfileController::class, 'edit'])->name(name: 'profile.edit');
    Route::patch(uri: '/profile',action: [ProfileController::class, 'update'])->name(name: 'profile.update');
    Route::delete(uri: '/profile',action: [ProfileController::class, 'destroy'])->name(name: 'profile.destroy');

});



Route::get('/explore', function () {
    return view('This is the Explore page');
})->name('explore');

Route::get('/reels', function () {
    return view('reels');
})->name('reels');


require __DIR__.'/auth.php';
