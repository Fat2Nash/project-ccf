<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Engin;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = Client::all();
        $engins = Engin::all();

        foreach ($clients as $client) {
            foreach ($engins as $engin) {
                \DB::table('loc_engin')->insert([
                    'client_id' => $client->id_client, // Utiliser l'ID du client
                    'id_engins' => $engin->id_engins, // Utiliser l'ID de l'engin
                    'adresse' => '21 rue du grand chêne',
                    'ville' => 'Charmes',
                    'code_postal' => '88130',
                    'pays' => 'France',
                    'Temps_fonct' => '250',
                    'Louer_le' => '2024-03-21', // Format date correct
                    'Rendu_le' => '2024-03-22', // Format date correct
                ]);

                // Insertion de données de position et de cycle fictives pour chaque location d'engin
                \DB::table('position_engin')->insert([
                    'id_loc_engin' => \DB::table('loc_engin')->max('id_loc_engin'),
                    'Longitude' => '482146',
                    'Latitude' => '61743',
                    'DateHeure' => '2024-03-22 15:22',
                ]);

                \DB::table('cycle_engin')->insert([
                    'id_loc_engin' => \DB::table('loc_engin')->max('id_loc_engin'),
                    'HeureMoteurON' => '15:00',
                    'HeureMoteurOFF' => '15:05',
                ]);
            }
        }
    }
}
