<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Engin;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {


        // Insert data into loc_engin table
        DB::table('loc_engin')->insert([
            'client_id' => 1,
            'id_engins' => 1,
            'adresse' => '21 rue du grand chêne',
            'ville' => 'Charmes',
            'code_postal' => '88130',
            'pays' => 'France',
            'Temps_fonct' => 250,
            'Louer_le' => '2024-03-21',
            'Rendu_le' => '2024-03-22',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '1',
            'Longitude' => '482146',
            'Latitude' => '61743',
            'DateHeure' => '2024-03-22 15:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '1',
            'HeureMoteurON' => '15:00',
            'HeureMoteurOFF' => '15:05',
        ]);
    }
}
