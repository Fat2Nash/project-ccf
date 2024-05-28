<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cycle; // Assurez-vous d'importer le modèle Client

class CycleController extends Controller
{
    public function index()
    {
        // Récupérer tous les clients de la base de données
        $cycle_engin = Cycle::all();

        // Passer les clients récupérés à la vue pour les afficher
        return view('votre_vue', ['cycle_engin' => $cycle_engin]);
    }
}
