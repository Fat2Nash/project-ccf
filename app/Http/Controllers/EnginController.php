<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Engin; // Assurez-vous d'importer le modèle Client

class ClientController extends Controller
{
    public function index()
    {
        // Récupérer tous les clients de la base de données
        $engins = Engin::all();

        // Passer les clients récupérés à la vue pour les afficher
        return view('votre_vue', ['engins' => $engins]);
    }
}
