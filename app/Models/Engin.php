<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engin extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'engins';
    protected $primaryKey = 'id_engins';

    // Attributs que vous pouvez remplir massivement
    protected $fillable = [
        'categorie',
        'marque',
        'modele',
        'description',
        'compteur_heures',
        'statut',
        'maintenance',
        'cree_le',
        'mis_a_jours_le',
    ];

    protected $casts = [
        'cree_le' => 'datetime',
        'mis_a_jours_le' => 'datetime',
    ];

    public function locationEngin()
    {
        return $this->hasOne(Location::class, 'id_engins', 'id_engins');
    }
}
