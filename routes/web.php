<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecupererDonneesUtilisateurs;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/clients', [RecupererDonneesUtilisateurs::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('client');

Route::view('/client', 'client')->name('client');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
