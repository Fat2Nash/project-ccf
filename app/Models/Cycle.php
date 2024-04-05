<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Cycle extends Model
{
    // Nom de la table associée au modèle

    protected $table = 'cycle_engin';
    protected $primaryKey = 'id_cycle';

    // Attributs que vous pouvez remplir massivement
    protected $fillable = [
        'id_loc_engin',
        'HeureMoteurON',
        'HeureMoteurOFF',
    ];

    // Relation avec la table 'position_engin'
    public function LocationEngin()
    {
        return $this->hasOne(Location::class, 'id_cycle', 'id_loc_engin');
    }

}
