<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ajouterdonnees;
use App\Http\Controllers\RecupererDonneesUtilisateurs;
use App\Http\Controllers\supprimer_fiche;
use Illuminate\Support\Facades\Route;




Route::get('/', [RecupererDonneesUtilisateurs::class, 'stats'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('supprimer_client/{id}', [supprimer_fiche::class, 'supprimerclient']);
Route::get('supprimer_engin/{id}', [supprimer_fiche::class, 'supprimerengin']);

Route::get('/engins-disponibles', [RecupererDonneesUtilisateurs::class, 'enginsdispo'])
    ->middleware(['auth', 'verified'])
    ->name('enginsdispo');

Route::get('/clients', [RecupererDonneesUtilisateurs::class, 'client'])
    ->middleware(['auth', 'verified'])
    ->name('client');

Route::get('/engins', [RecupererDonneesUtilisateurs::class, 'engin'])
    ->middleware(['auth', 'verified'])
    ->name('engin');

Route::get('/parametres', [RecupererDonneesUtilisateurs::class, 'parametres'])
    ->middleware(['auth', 'verified'])
    ->name('parametres');

Route::post('/nouveau_client', [ajouterdonnees::class, 'ajouterclient']);
Route::post('/nouvel_engin', [ajouterdonnees::class, 'ajouterengin']);


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
