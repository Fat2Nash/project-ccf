<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Engin;
use App\Models\Location;


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
    // Séparer les heures et les minutes en utilisant explode
    list($heure, $minutes) = explode(':', $request->input('temps'));

    // Convertir les heures et les minutes en secondes
    $compteur_heures = ($heure * 3600) + ($minutes * 60);

    // Assigner la valeur convertie à votre variable $engin->compteur_heures
    $engin->compteur_heures = $compteur_heures;
    $engin->Num_Machine = $request->input('numero');
    $engin->statut = $request->input('statut');
    $engin->maintenance = 0;
    $engin->cree_le = now();
    $engin->mis_a_jours_le = now();
    $engin->save();

    return redirect()->route('engin');
}

public function ajouterlocation2(Request $request)
{
    $location = new Location();
    $location->client_id = $request->input('id_client');
    $location->adresse = $request->input('adresse');
    $location->ville = $request->input('ville');
    $location->code_postal = $request->input('code_postal');
    $location->pays = $request->input('pays');
    $location->id_engins = $request->input('id_engin');
    $location->Temps_fonct = 0;
    $location->Louer_le = $request->input('emprunt');
    $location->Rendu_le = $request->input('retour');
    $location->Status = "ok";
    $location->save();

    return redirect()->route('locations');
}
}
