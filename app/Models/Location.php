<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'loc_engin';
    protected $primaryKey = 'id_loc_engin';
    public $timestamps = false;

    // Attributs que vous pouvez remplir massivement
    protected $fillable = [
        'client_id',
        'id_engins',
        'adresse',
        'ville',
        'code_postal',
        'pays',
        'Temps_fonct',
        'Louer_le',
        'Rendu_le',
        'Status'

    ];

    // Types de données des colonnes
    protected $casts = [
        'Louer_le' => 'datetime',
        'Rendu_le' => 'datetime',
    ];

    // Relation avec la table 'position_engin'
    public function positionEngin()
    {
        return $this->hasOne(Position::class, 'id_loc_engin', 'id_loc_engin');
    }

    // Relation avec la table 'cycle_engin'
    // public function cycleEngin()
    // {
    //     return $this->hasOne(Cycle::class, 'id_loc_engin', 'id_loc_engin');
    // }

    // Dans le modèle Location.php
    public function engin()
    {
        return $this->belongsTo(Engin::class, 'id_engins');
    }
}
