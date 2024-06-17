<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Engin;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Location;

class RecupererDonneesUtilisateurs extends Controller
{
    public function client()
    {
        $clients = Client::all();
        return view('client', ['clients' => $clients]);
    }

    public function engin()
    {
        $engins = Engin::all();
        return view('engin', ['engins' => $engins]);
    }

    public function locations()
    {
        $locations = Location::all();
        $clients = Client::all();
        $engins = Engin::all();
        return view('locations', ['locations' => $locations , 'engins' => $engins, 'clients' => $clients]);
    }

    public function enginsdispo()
    {
        $enginsdispo = Engin::where('statut', 'Disponible')->get();
        return view('enginsdispo', ['enginsdispo' => $enginsdispo]);
    }

    public function stats()
    {
        $total = Engin::all();
        $loue = Engin::where('statut', 'Loué')->get();
        $dispo = Engin::where('statut', 'Disponible')->get();
        $autre = Engin::whereNotIn('statut', ['Disponible', 'Loué'])->get();
        return view('welcome', [
            'loue' => $loue,
            'dispo' => $dispo,
            'autre' => $autre,
            'total' => $total
        ]);

        
    }

    public function parametres()
    {
        $parametres = User::all();
        return view('parametres', ['parametres' => $parametres]);
    }
}
