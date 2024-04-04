<?php

namespace App\Http\Controllers;

use App\Models\Position;

class LocationController extends Controller
{
    public function index()
    {
        // Récupérer toutes les positions pour chaque engin
        $positions = Position::all();

        // Grouper les positions par engin et par date
        $positionsGroupedByEnginAndDate = $positions->groupBy(function ($position) {
            return $position->engin_id . '_' . $position->created_at->toDateString();
        });

        // Filtrer pour obtenir la dernière position de chaque engin pour chaque jour
        $latestPositions = $positionsGroupedByEnginAndDate->map(function ($positionsPerEngin) {
            return $positionsPerEngin->last();
        });

        // Passer les positions récupérées à la vue pour les afficher
        return view('your_view', ['latestPositions' => $position_engin]);
    }
}
