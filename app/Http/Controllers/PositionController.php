<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position; // Assurez-vous d'importer le modèle Client

class PositionController extends Controller
{
    public function index()
    {
        // Récupérer tous les clients de la base de données
        $position_engin = Position::all();

        // Passer les clients récupérés à la vue pour les afficher
        return view('votre_vue', ['position_engin' => $position_engin]);
    }
}
