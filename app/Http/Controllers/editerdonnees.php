<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class editerdonnees extends Controller
{
    public function editer_client($id)
    {
        $client = Client::where('id_client', $id)->get();
        return view('editClient', ['client' => $client]);
    }

    public function update(Request $request, $id)
    {
 // Rechercher le client par UUID
$client = Client::where('id_client', $id)->first();

// Mettre à jour les informations du client
    $client->nom = $request->input('nom');
    $client->prenom = $request->input('prenom');
    $client->mail = $request->input('mail');
    $client->adresse = $request->input('adresse');
    $client->ville = $request->input('ville');
    $client->code_postal = $request->input('code_postal');
    $client->pays = $request->input('pays');
    $client->telephone = $request->input('telephone');
    $client->notes = $request->input('notes');
    
    // Sauvegarder les modifications
    $client->save();

        return redirect('/clients');
    }
}
