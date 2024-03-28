<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class ajouterdonnees extends Controller
{
    public function ajouterclient(Request $request)
    {
        $client = new Client();
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->mail = $request->input('mail');
        $client->adresse = $request->input('adresse');
        $client->ville = $request->input('ville');
        $client->code_postal = $request->input('code_postal');
        $client->pays = $request->input('pays');
        $client->telephone = $request->input('telephone');
        $client->notes = $request->input('notes');
        $client->cree_le = now();
        $client->save();

        return redirect()->route('client');
    }

public function ajouterengin(Request $request)
{
    $client = new Client();
    $client->nom = $request->input('nom');
    $client->prenom = $request->input('prenom');
    $client->mail = $request->input('mail');
    $client->adresse = $request->input('adresse');
    $client->ville = $request->input('ville');
    $client->code_postal = $request->input('code_postal');
    $client->pays = $request->input('pays');
    $client->telephone = $request->input('telephone');
    $client->notes = $request->input('notes');
    $client->cree_le = now();
    $client->save();

    return redirect()->route('engin');
}
}
