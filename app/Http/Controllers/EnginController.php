<?php

namespace App\Http\Controllers;

use App\Models\Engin;
use App\Models\Location;
use App\Models\Position;
use Illuminate\Http\Request;
use  \Illuminate\Http\JsonResponse;

class EnginController extends Controller
{
    public function getEnginInfo($enginId)
    {
        // Exécutez la requête SQL pour récupérer les informations sur l'engin
        $enginInfo = DB::select('SELECT engins.marque, engins.modele, engins.categorie, position_engin.DateHeure FROM engins JOIN loc_engin ON engins.id_engins = loc_engin.id_engins JOIN position_engin ON loc_engin.id_loc_engin = position_engin.id_loc_engin WHERE engins.id_engins = ?', [$enginId]);

        // Retournez les informations sur l'engin au format JSON
        return response()->json($enginInfo);
    }

    public function getPositionByEnginId($enginId)
    {
        // Requête pour récupérer les positions de l'engin spécifié
        $positions = Position::select('position_engin.id_position', 'position_engin.Latitude', 'position_engin.Longitude', 'position_engin.DateHeure')
            ->join('loc_engin', 'loc_engin.id_loc_engin', '=', 'position_engin.id_loc_engin')
            ->join('engins', 'engins.id_engins', '=', 'loc_engin.id_engins')
            ->where('engins.id_engins', $enginId)
            ->get();
        // Retourner les positions sous forme de réponse JSON
        return response()->json($positions);
    }
}
