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

        // Récupérer toutes les locations
        $loc_engin = Location::all();

        // Récupérer toutes les positions
        $position_engin = Position::all();

        // Passer les données à la vue
        return view('MapsEngins', compact('engins', 'loc_engin', 'position_engin'));
    }
}
