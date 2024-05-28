<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location; // Add this line to import the LocationEngin class

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primaryKey = 'id_client';

    protected $fillable = [
        'nom',
        'prenom',
        'mail',
        'adresse',
        'ville',
        'code_postal',
        'pays',
        'telephone',
        'notes',
        'cree_le',
    ];

    protected $casts = [
        'cree_le' => 'datetime',
    ];

    public function LocationEngin()
    {
        return $this->hasOne(Location::class, 'id_client', 'id_loc_engin');
    }
}

