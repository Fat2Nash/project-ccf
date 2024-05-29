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
            'Status' => 'Recuperer', // Ajout de la colonne Status
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

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '1',
            'Longitude' => '48.15',
            'Latitude' => '6.25',
            'DateHeure' => '2024-03-22 19:22',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '1',
            'Longitude' => '48.1667',
            'Latitude' => '6.3167',
            'DateHeure' => '2024-03-22 20:22',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '1',
            'Longitude' => '48.183331',
            'Latitude' => '6.38333',
            'DateHeure' => '2024-03-22 21:22',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '1',
            'Longitude' => '48.183331',
            'Latitude' => '6.45',
            'DateHeure' => '2024-03-22 22:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '1',
            'HeureMoteurON' => '2024-03-22 15:00',
            'HeureMoteurOFF' => '2024-03-22 15:05',
        ]);


        DB::table('loc_engin')->insert([
            'client_id' => 2,
            'id_engins' => 2,
            'adresse' => '1 rue du vin',
            'ville' => 'Epinal',
            'code_postal' => '88000',
            'pays' => 'France',
            'Temps_fonct' => 600,
            'Status' => 'Fini',
            'Louer_le' => '2024-03-27',
            'Rendu_le' => '2024-03-28',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.1814101770421',
            'Latitude' => '6.208779881654873',
            'DateHeure' => '2024-04-20 08:22',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.15',
            'Latitude' => '6.25',
            'DateHeure' => '2024-04-20 09:22',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.1667',
            'Latitude' => '6.3167',
            'DateHeure' => '2024-04-20 10:22',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.183331',
            'Latitude' => '6.38333',
            'DateHeure' => '2024-04-20 11:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '2',
            'HeureMoteurON' => '2024-03-22 11:00',
            'HeureMoteurOFF' => '2024-03-22 13:22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 3,
            'id_engins' => 3,
            'adresse' => '1 rue du vin',
            'ville' => 'Epinal',
            'code_postal' => '88000',
            'pays' => 'France',
            'Temps_fonct' => 600,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-27',
            'Rendu_le' => '2024-03-28',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.1814101770421',
            'Latitude' => '6.208779881654873',
            'DateHeure' => '2024-04-20 08:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '2',
            'HeureMoteurON' => '2024-03-22 11:00',
            'HeureMoteurOFF' => '2024-03-22 13:22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 4,
            'id_engins' => 4,
            'adresse' => '1 rue du vin',
            'ville' => 'Epinal',
            'code_postal' => '88000',
            'pays' => 'France',
            'Temps_fonct' => 600,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-27',
            'Rendu_le' => '2024-03-28',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.1814101770421',
            'Latitude' => '6.208779881654873',
            'DateHeure' => '2024-04-20 08:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '2',
            'HeureMoteurON' => '2024-03-22 11:00',
            'HeureMoteurOFF' => '2024-03-22 13:22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 5,
            'id_engins' => 5,
            'adresse' => '1 rue du vin',
            'ville' => 'Epinal',
            'code_postal' => '88000',
            'pays' => 'France',
            'Temps_fonct' => 600,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-27',
            'Rendu_le' => '2024-03-28',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.1814101770421',
            'Latitude' => '6.208779881654873',
            'DateHeure' => '2024-04-20 08:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '2',
            'HeureMoteurON' => '2024-03-22 11:00',
            'HeureMoteurOFF' => '2024-03-22 13:22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 6,
            'id_engins' => 6,
            'adresse' => '1 rue du vin',
            'ville' => 'Epinal',
            'code_postal' => '88000',
            'pays' => 'France',
            'Temps_fonct' => 600,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-27',
            'Rendu_le' => '2024-03-28',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.1814101770421',
            'Latitude' => '6.208779881654873',
            'DateHeure' => '2024-04-20 08:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '2',
            'HeureMoteurON' => '2024-03-22 11:00',
            'HeureMoteurOFF' => '2024-03-22 13:22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 7,
            'id_engins' => 7,
            'adresse' => '1 rue du vin',
            'ville' => 'Epinal',
            'code_postal' => '88000',
            'pays' => 'France',
            'Temps_fonct' => 600,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-27',
            'Rendu_le' => '2024-03-28',
        ]);

        // Insert position data into position_engin table
        DB::table('position_engin')->insert([
            'id_loc_engin' => '2',
            'Longitude' => '48.1814101770421',
            'Latitude' => '6.208779881654873',
            'DateHeure' => '2024-04-20 08:22',
        ]);

        // Insert cycle data into cycle_engin table
        DB::table('cycle_engin')->insert([
            'id_loc_engin' => '2',
            'HeureMoteurON' => '2024-03-22 11:00',
            'HeureMoteurOFF' => '2024-03-22 13:22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 8,
            'id_engins' => 8,
            'adresse' => '21 rue du grand chêne',
            'ville' => 'Charmes',
            'code_postal' => '88130',
            'pays' => 'France',
            'Temps_fonct' => 250,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-21',
            'Rendu_le' => '2024-03-22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 9,
            'id_engins' => 9,
            'adresse' => '21 rue du grand chêne',
            'ville' => 'Charmes',
            'code_postal' => '88130',
            'pays' => 'France',
            'Temps_fonct' => 250,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-21',
            'Rendu_le' => '2024-03-22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 10,
            'id_engins' => 10,
            'adresse' => '21 rue du grand chêne',
            'ville' => 'Charmes',
            'code_postal' => '88130',
            'pays' => 'France',
            'Temps_fonct' => 250,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-21',
            'Rendu_le' => '2024-03-22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 11,
            'id_engins' => 11,
            'adresse' => '21 rue du grand chêne',
            'ville' => 'Charmes',
            'code_postal' => '88130',
            'pays' => 'France',
            'Temps_fonct' => 250,
            'Status' => 'Livrer',
            'Louer_le' => '2024-03-21',
            'Rendu_le' => '2024-03-22',
        ]);

        DB::table('loc_engin')->insert([
            'client_id' => 12,
            'id_engins' => 12,
            'adresse' => '21 rue du grand chêne',
            'ville' => 'Charmes',
            'code_postal' => '88130',
            'pays' => 'France',
            'Temps_fonct' => 250,
            'Status' => 'Fini',
            'Louer_le' => '2024-03-21',
            'Rendu_le' => '2024-03-22',
        ]);
    }
}
