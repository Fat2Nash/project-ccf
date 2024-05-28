<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alerte extends Model
{
    protected $table = 'alerte'; // Nom de la table 'alerte' dans votre base de données
    protected $primaryKey = 'id_alerte';
    public $timestamps = false; // Désactiver la gestion automatique des horodatages

    protected $fillable = [
        'id_engin',
        'id_typeAlerte',
        'date_alerte',
        'status',
        // Ajoutez d'autres attributs au besoin
    ];

    // Définir une relation avec le modèle Engin
    public function engin()
    {
        return $this->belongsTo(Engin::class, 'id_engin');
    }

    // Définir une relation avec le modèle TypeAlerte
    public function typeAlerte()
    {
        return $this->belongsTo(TypeAlerte::class, 'id_typeAlerte');
    }
}
