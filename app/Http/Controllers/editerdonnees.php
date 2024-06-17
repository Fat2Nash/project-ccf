<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Engin;
use App\Models\Location;
use Illuminate\Http\Request;

class editerdonnees extends Controller
{
    public function editer_client($id)
    {
        $client = Client::where("id_client", $id)->get();
        return view("editClient", ["client" => $client[0]]);
    }

    public function update_client(Request $request, $id)
    {
        // Rechercher le client
        $client = Client::where("id_client", $id)->first();

        // Mettre à jour les informations du client
        $client->nom = $request->input("nom");
        $client->prenom = $request->input("prenom");
        $client->mail = $request->input("mail");
        $client->adresse = $request->input("adresse");
        $client->ville = $request->input("ville");
        $client->code_postal = $request->input("code_postal");
        $client->pays = $request->input("pays");
        $client->telephone = $request->input("telephone");
        $client->notes = $request->input("notes");

        // Sauvegarder les modifications
        $client->save();

        return redirect("/clients");
    }

    public function editer_engin($id)
    {
        $engin = Engin::where("id_engins", $id)->get();
        return view("editEngin", ["engin" => $engin[0]]);
    }

    public function update_engin(Request $request, $id)
    {
        $engin = Engin::where("id_engins", $id)->first();

        $engin->Num_Machine = $request->input("numero");
        $engin->categorie = $request->input("categorie");
        $engin->marque = $request->input("marque");
        $engin->modele = $request->input("modele");
        $engin->statut = $request->input("statut");
        $engin->description = $request->input("description");
        $engin->mis_a_jours_le = now();
        // Sauvegarder les modifications
        $engin->save();

        return redirect("/engins");
    }

    public function editer_loc($id)
    {

        
        $location = Location::where("id_loc_engin", $id)->get();
        $clients = Client::all();
        $engins = Engin::all();
        return view('editLocation', ['location' => $location[0] , 'engins' => $engins, 'clients' => $clients]);
    
    }

    public function update_loc(Request $request, $id)
    {
        $loc = Location::where("id_loc_engin", $id)->first();

        $loc->client_id = $request->input("client");
        $loc->id_engins = $request->input("engin");
        $loc->adresse = $request->input("adresse");
        $loc->ville = $request->input("ville");
        $loc->code_postal = $request->input("code_postal");
        $loc->pays = $request->input("pays");
        $loc->Louer_le = $request->input('debut');
        $loc->Rendu_le = $request->input('rendu');
        
        
        // Sauvegarder les modifications
        $loc->save();

        return redirect("/locations");
    }
}
