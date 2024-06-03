<?php

namespace App\Http\Controllers;

use App\Models\Engin;
use App\Models\Location;
use App\Models\Position;
use Illuminate\Http\Request;
use  \Illuminate\Http\JsonResponse;

class EnginController extends Controller
{
    public function index()
    {
        // Récupérer tous les engins
        $engins = Engin::all();

        // Récupérer les locations associées à chaque engin
        $loc_engins = Location::with('engin')->get();

        // Récupérer les positions associées à chaque location
        $position_engin = Position::all();

        // Passer les données à la vue
        return view('MapsEngins', compact('engins', 'loc_engins', 'position_engin'));
    }

    public function getPosition(Request $request)
    {
        $enginId = $request->input('id');

        $positions = Position::where('id_loc_engin', $enginId)->get();

        return response()->json([
            'success' => true,
            'engin_id' => $enginId,
            'positions' => $positions,
        ]);
    }

    public function getPositionForDateRange($enginId, $startDate, $endDate)
    {
        $positions = Position::where('id_loc_engin', $enginId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        return response()->json($positions);
    }

    public function getPositionForToday($enginId)
    {
        $today = Carbon::today();
        $positions = Position::where('id_loc_engin', $enginId)
            ->whereDate('created_at', $today)
            ->get();

        return response()->json($positions);
    }
}
