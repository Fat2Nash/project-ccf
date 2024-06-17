<?php

use App\Mail\AlerteMaintenance;
use App\Models\Alerte;
use App\Models\Engin;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// commande pour forcer les tache planifier :
// php artisan schedule:run
// cronjob linux pour executer les tache planifier sur le serveur
//  * * * * * cd /path-to-your-project && php artisan schedule >> /dev/null 2>&1

Schedule::call(function () {
    // Récupérer toutes les machines de la table engin
    $engins = Engin::all();

    // Période de temps entre chaque maintenance (en heures)
    $periodMaintenance = 300;

    foreach ($engins as $engin) {
        // Calculer le nombre de maintenances nécessaires
        $maintenanceRequired = floor($engin->compteur_heures / $periodMaintenance);

        // Comparer avec le champ "maintenance" dans la base de données
        if ($engin->maintenance < $maintenanceRequired) {
            // Vérifier s'il existe déjà une alerte pour cet engin avec le même type et statut
            $existingAlert = Alerte::where('id_engin', $engin->id_engins)
                                   ->where('id_typeAlerte', 1) // Modifier selon votre besoin
                                    ->where('status', 'Maintenance à effectuer')
                                    ->exists();

            // Si aucune alerte existante n'est trouvée, créer une nouvelle alerte
            if (!$existingAlert) {
                $nouvelleAlerte = new Alerte();
                $nouvelleAlerte->id_engin = $engin->id_engins;
                $nouvelleAlerte->id_typeAlerte = 1; // Modifier selon votre besoin
                $nouvelleAlerte->date_alerte = date('Y-m-d H:i:s'); // Utilisation de la fonction date() pour obtenir la date actuelle
                $nouvelleAlerte->status = "Maintenance à effectuer";
                $nouvelleAlerte->save();

                Mail::to('kasimyanik742@gmail.com')
                    ->send(new AlerteMaintenance());
            }

            // si le statut l'engin n'est pas loué
            if ($engin->statut != "Loué") {
                // passer le status de l'engin en indisponible
                $engin->update(['statut'=>'Indisponible']);

            }
        }
    }
})->everyMinute();
