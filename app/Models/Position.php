<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'position_engin';
    protected $primaryKey = 'id_position';

    // Attributs que vous pouvez remplir massivement
    protected $fillable = [
        'id_loc_engin',
        'Longitude',
        'Latitude',
        'DateHeure',
    ];

    // Types de données des colonnes
    protected $casts = [
        'DateHeure' => 'datetime',
    ];

    // Relation avec la table 'position_engin'
    public function LocationEngin()
    {
        return $this->hasOne(Location::class, 'id_position', 'id_loc_engin');
    }

    // Dans le modèle Position.php
    public function location()
    {
        return $this->belongsTo(Location::class, 'id_loc_engin');
    }
}
