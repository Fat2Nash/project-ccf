<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // Nom de la table associée au modèle
    protected $table = 'loc_engin';

    // Attributs que vous pouvez remplir massivement
    protected $fillable = [
        'Louer_le', 'Rendu_le',
    ];

    // Si vous avez des relations avec d'autres modèles, vous pouvez les définir ici
    // Par exemple, une relation One-to-Many avec une table de commandes
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
