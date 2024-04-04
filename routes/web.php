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

Route::get('/get-coordinates', function(Request $request) {
    $adresse = $request->input('adresse');

    // Utilisez $adresse pour récupérer les coordonnées depuis la base de données ou un service de géocodage

    // Exemple fictif
    $latitude = 48.12345;
    $longitude = 6.54321;

    return response()->json(['latitude' => $latitude, 'longitude' => $longitude]);
});


require __DIR__.'/auth.php';
