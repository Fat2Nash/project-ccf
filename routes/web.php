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

Route::get('/location-fiche', function () {
    return view('locationFiche');
});

Route::get('/livraisons/{id?}', function ($id = null) {
    return view('livraisons',[$id]);
});

// Routes Maintenances
Route::get('/maintenances', function () {
    return view('maintenances');
});

Route::get('/maintenances/{idMaintenance?}', function ($idMaintenance = null) {
    return view('maintenance-details',[$idMaintenance]);
});

Route::get('/nouvelle-maintenance/{idEngin?}', function ($idEngin = null) {
    return view('maintenance-nouvelle',[$idEngin]);
});

// Routes Notifications
Route::get('/notifications', function () {
    return view('notifications');
});

Route::post('/update-status', function (Illuminate\Http\Request $request) {
    // Récupérer l'ID de la location et le nouveau statut depuis la requête POST
    $locationId = $request->input('location_id');
    $newStatus = $request->input('new_status');

    // Mettre à jour le statut de la location dans la base de données
    App\Models\Location::where('id_loc_engin', $locationId)->update(['Status' => $newStatus]);

    // Rediriger vers une page de confirmation ou une autre page appropriée
    return back()->with('success', 'Statut de la location mis à jour avec succès.');
})->name('update_Status');

Route::post('/creer-maintenance', function (Illuminate\Http\Request $request) {

    // Récupérer les données de la maintenance depuis la requête POST
    $id_engin = $request->input('id_engin');
    $remarque = $request->input('remarque');
    $defauts = $request->input('defaut');
    $date_maintenance = $request->input('date_heure_maintenance');
    $id_mecaniciens = $request->input('mecanicien');

    // Enregistrer la maintenance dans la bdd
    $maintenance = new App\Models\Maintenance();
    $maintenance->id_engin = $id_engin;
    $maintenance->remarque = $remarque;
    $maintenance->defauts = $defauts;
    $maintenance->date_maintenance = $date_maintenance;
    $maintenance->id_mecaniciens = $id_mecaniciens;
    $maintenance->save();

    // Rediriger vers la liste des maintenances
    return redirect('/maintenances');
})->name('creer_maintenance');

require __DIR__.'/auth.php';
