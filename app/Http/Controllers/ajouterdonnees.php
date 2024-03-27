<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class ajouterdonnees extends Controller
{
    public function ajouter(Request $request)
    {
        $client = Client::create([
            'nom' => $request ->input('nom'),
            'prenom' => 'Eric',
            'mail' => 'eric.derendinger@gmail.com',
            'adresse' => '1 rue de la Paix',
            'code_postal' => '75000',
            'ville' => 'Paris',
            'pays' => 'France',
            'telephone' => '+33 6 12 34 56 78',
            'notes' => 'Client fidèle depuis 2015',
            'cree_le' => now(),
        ]);
        return redirect()->route('client');
    }
}
