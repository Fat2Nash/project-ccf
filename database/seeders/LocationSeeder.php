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
            'Longitude' => '48.1814101770421',
            'Latitude' => '6.208779881654873',
            'DateHeure' => '2024-03-22 15:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '1',
            'HeureMoteurON' => '15:00',
            'HeureMoteurOFF' => '15:05',
        ]);


        DB::table('loc_engin')->insert([
            'client_id' => 2,
            'id_engins' => 2,
            'adresse' => '1 rue du vin',
            'ville' => 'Epinal',
            'code_postal' => '88000',
            'pays' => 'France',
            'Temps_fonct' => 600,
            'Louer_le' => '2024-03-27',
            'Rendu_le' => '2024-03-28',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.1814101770421',
            'Latitude' => '6.208779881654873',
            'DateHeure' => '2024-03-28 13:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '2',
            'HeureMoteurON' => '11:00',
            'HeureMoteurOFF' => '13:22',
        ]);
    }
}
