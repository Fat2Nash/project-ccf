<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeAlerte extends Model
{
    protected $table = 'typealerte'; // Nom de la table 'typealerte' dans votre base de données
    protected $primaryKey = 'id_typeAlerte';
    public $timestamps = false; // Désactiver la gestion automatique des horodatages

    protected $fillable = [
        'nom_alerte',
        'description',
        // Ajoutez d'autres attributs au besoin
    ];

    // Relation avec le modèle Alerte
    public function alertes()
    {
        return $this->hasMany(Alerte::class, 'id_typeAlerte');
    }
}
