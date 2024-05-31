<?php

namespace App\Http\Controllers;

use App\Models\Engin;
use App\Models\Location;
use App\Models\Position;
use Illuminate\Http\Request;

class EnginController extends Controller
{
    public function index()
    {
        // Récupérer tous les engins
        $engins = Engin::all();

        // Récupérer les locations associées à chaque engin
        $loc_engins = Location::with('engin')->get();

        // Récupérer les positions associées à chaque location
        $position_engin = Position::all();

        // Passer les données à la vue
        return view('MapsEngins', compact('engins', 'loc_engins', 'position_engin'));
    }
}
