<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Engin;
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
}
