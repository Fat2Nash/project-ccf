<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location; // Assurez-vous d'importer le modèle Client

class LocationController extends Controller
{
    public function index()
    {
        // Récupérer tous les clients de la base de données
        $loc_engin = Location::all();

        // Passer les clients récupérés à la vue pour les afficher
        return view('votre_vue', ['loc_engin' => $loc_engin]);
    }
}
