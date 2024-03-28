<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Engin;

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
    $engin = new Engin();
    $engin->marque = $request->input('marque');
    $engin->modele = $request->input('modele');
    $engin->categorie = $request->input('categorie');
    $engin->description = $request->input('description');
    //Convertir les heures de fonctionnnement (format HH:MM en secondes)
    list($heure, $minutes) = explode(':', $request->input('nb_heures'));
    $engin->compteur_heures = $heure*3600+$minutes*60;
    $engin->statut = $request->input('statut');
    $engin->maintenance = $request->input('maintenance');
    $engin->cree_le = now();
    $engin->mis_a_jours_le = now();
    $engin->save();

    return redirect()->route('engin');
}
}
