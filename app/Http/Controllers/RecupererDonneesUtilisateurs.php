<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RecupererDonneesUtilisateurs extends Controller
{
    public function index()
    {
        // Retrieve all products from the database
       // Importer le modèle Client
        $clients = User::all();
        return view('/client', ['clients' => $clients]);
    }
}
