<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/HistoriqueClients', function () {
    return view('HistoriqueClients');
});

Route::get('/HistoriqueEngins', function () {
    return view('HistoriqueEngins');
});

Route::get('/HistoriqueLocations', function () {
    return view('HistoriqueLocations');
});

Route::get('/MapsEngins', function () {
    return view('MapsEngins');
});

require __DIR__.'/auth.php';
