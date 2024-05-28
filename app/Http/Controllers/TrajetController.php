<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        return view('maps.index');
    }

    public function getRoute(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');

        // Appel à l'API OpenStreetMap pour obtenir les directions
        $url = "https://api.openstreetmap.org/directions/v2/driving/$origin;$destination.json";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        // Envoi des données à la vue
        return response()->json($data['routes'][0]['geometry']);
    }
}
