<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $table = 'maintenance'; // Nom de la table de maintenance dans votre base de données
    protected $primaryKey = 'id_maintenance';
    public $timestamps = false; // Désactiver la gestion automatique des horodatages


    protected $fillable = [
        'id_engin',
        'remarque',
        'defauts',
        'id_mecaniciens',
        'date_maintenance',
        // Ajoutez d'autres attributs au besoin
    ];

    // Si la maintenance est associée à un engin, vous pouvez définir une relation ici
    public function Engin()
    {
        return $this->belongsTo(Engin::class, 'id_engin');
    }

    // Si la maintenance est associée à un mécanicien, vous pouvez définir une relation ici
    public function User()
    {
        return $this->belongsTo(User::class, 'id_mecaniciens');
    }
}
