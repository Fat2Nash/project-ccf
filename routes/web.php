<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ajouterdonnees;
use App\Http\Controllers\RecupererDonneesUtilisateurs;
use App\Http\Controllers\supprimer_fiche;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;
use App\Http\Controllers\EnginController;

# ======================
# Route Communes
# ======================
Route::get('/', [RecupererDonneesUtilisateurs::class, 'stats'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




# ======================
# Route Erwan
# ======================


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




    Route::get('/location-fiche', function () {
        return view('locationFiche');
    });


# ======================
# Route Antony
# ======================

Route::get('/HistoriqueClients', function () {
    return view('HistoriqueClients');
});

Route::get('/HistoriqueEngins', function () {
    return view('HistoriqueEngins');
});

Route::get('/HistoriqueLocations', function () {
    return view('HistoriqueLocations');
});

Route::get('/MapsEngins', [EnginController::class, 'index']);

Route::get('/MapsEngins2', [EnginController::class, 'index']);


Route::post('/engin-position', [EnginController::class, 'getPosition']);
Route::get('/positions/{enginId}/range/{startDate}/{endDate}', [EnginController::class, 'getPositionForDateRange']);
Route::get('/positions/{enginId}/today', [EnginController::class, 'getPositionForToday']);

# ======================
# Route Kasim
# ======================

Route::get('/livraisons/{id?}', function () {
    return view('livraisons');
});

// Routes Maintenances
Route::get('/maintenances', function () {
    return view('maintenances');
});

Route::get('/maintenances/{idMaintenance?}', function () {
    return view('maintenance-details');
});

Route::get('/nouvelle-maintenance/{idEngin?}', function () {
    return view('maintenance-nouvelle');
});

// Routes Notifications
Route::get('/notifications', function () {
    return view('notifications');
});
Route::post('/update_status_alerte', function (Illuminate\Http\Request $request) {
    // Récupérer l'ID de l'alerte depuis la requête POST
    $alerteId = $request->input('alerte_id');

    // Mettre à jour le statut de l'alerte dans la base de données
    App\Models\Alerte::where('id_alerte', $alerteId)->update(['status' => 'Maintenance effectuer']);

    // Rediriger vers une page de confirmation ou une autre page appropriée
    return back()->with('success', 'Statut de l\'alerte mis à jour avec succès.');
})->name('update_status_alerte');

// Route::get('/', function () {
//    Mail::to('demomailtrap.com')
//    ->send(new HelloMail())
// });

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
