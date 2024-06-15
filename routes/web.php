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
Route::get('supprimer_location/{id}', [supprimer_fiche::class, 'supprimerloc']);

Route::get('/engins-disponibles', [RecupererDonneesUtilisateurs::class, 'enginsdispo'])
    ->middleware(['auth', 'verified'])
    ->name('enginsdispo');

Route::get('/clients', [RecupererDonneesUtilisateurs::class, 'client'])
    ->middleware(['auth', 'verified'])
    ->name('client');

    Route::get('/locations', [RecupererDonneesUtilisateurs::class, 'locations'])
    ->middleware(['auth', 'verified'])
    ->name('locations');


Route::get('/engins', [RecupererDonneesUtilisateurs::class, 'engin'])
    ->middleware(['auth', 'verified'])
    ->name('engin');

Route::get('/parametres', [RecupererDonneesUtilisateurs::class, 'parametres'])
    ->middleware(['auth', 'verified'])
    ->name('parametres');

Route::get('/parametres', [RecupererDonneesUtilisateurs::class, 'parametres'])
    ->middleware(['auth', 'verified'])
    ->name('parametres');


Route::post('/nouveau_client', [ajouterdonnees::class, 'ajouterclient']);
Route::post('/nouvel_engin', [ajouterdonnees::class, 'ajouterengin']);
Route::post('/nouvelle_location', [ajouterdonnees::class, 'ajouterlocation']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
