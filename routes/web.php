<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ajouterdonnees;
use App\Http\Controllers\RecupererDonneesUtilisateurs;
use Illuminate\Support\Facades\Route;


Route::get('/', [RecupererDonneesUtilisateurs::class, 'stats'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/engins-disponibles', [RecupererDonneesUtilisateurs::class, 'enginsdispo'])
    ->middleware(['auth', 'verified'])
    ->name('enginsdispo');

Route::get('/clients', [RecupererDonneesUtilisateurs::class, 'client'])
    ->middleware(['auth', 'verified'])
    ->name('client');

Route::get('/engins', [RecupererDonneesUtilisateurs::class, 'engin'])
    ->middleware(['auth', 'verified'])
    ->name('engin');


Route::post('/nouveau_client', [ajouterdonnees::class, 'ajouterclient']);
Route::post('/nouvel_engin', [ajouterdonnees::class, 'ajouterengin']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
