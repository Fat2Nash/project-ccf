<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Engin;
use App\Models\User;
use Illuminate\Http\Request;

class RecupererDonneesUtilisateurs extends Controller
{
    public function client()
    {
        // Retrieve all products from the database
       // Importer le modèle Client
        $clients = Client::all();
        return view('/client', ['clients' => $clients]);
    }
    public function engin(){
        $engins = Engin::all();
        return view('/engin', ['engins' => $engins]);
    }
    public function enginsdispo(){
        $enginsdispo = Engin::where('statut', 'Disponible')->get();
        return view('/enginsdispo', ['enginsdispo' => $enginsdispo]);
    }
    public function stats(){
        $total = Engin::all();
        $loue = Engin::where('statut', 'Loué')->get();
        $dispo = Engin::where('statut', 'Disponible')->get();
        $autre = Engin::where('statut', 'Autre')->get();
        $maintenance = Engin::where('maintenance', '1')->get();
        return view('/welcome', ['loue' => $loue, 'dispo' => $dispo, 'autre'=> $autre, 'maintenance' => $maintenance, 'total' => $total]);
    }
    public function parametres(){
        $parametres = User::all();
        return view('/parametres', ['parametres' => $parametres]);
    }
}
