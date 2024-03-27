<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class RecupererDonneesUtilisateurs extends Controller
{
    public function index()
    {
        // Retrieve all products from the database
       // Importer le modèle Client
        $clients = Client::all();
        return view('/client', ['clients' => $clients]);
    }
}
