<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // Créez un utilisateur de test
                DB::table('engins')->insert([
                    'categorie' => 'Pelle',
                    'marque' => 'Caterpillar',
                    'modele' => '320',
                    'description' => 'Pelle hydraulique sur chenilles',
                    'compteur_heures' => 15000,
                    'statut' => 'Disponible',
                    'maintenance' => 0,
                    'cree_le' => now(),
                    'mis_a_jours_le' => now(),
                ]);
                // Créez un utilisateur de test
                DB::table('engins')->insert([
                    'categorie' => 'Mini Pelle',
                    'marque' => 'Caterpillar',
                    'modele' => '123',
                    'description' => 'Mini pelle hydraulique sur chenilles',
                    'compteur_heures' => 5000,
                    'statut' => 'Loué',
                    'maintenance' => 0,
                    'cree_le' => now(),
                    'mis_a_jours_le' => now(),
                ]);
                // Créez un utilisateur de test
                DB::table('engins')->insert([
                    'categorie' => 'Pelteuse',
                    'marque' => 'Caterpillar',
                    'modele' => '943',
                    'description' => 'pelteuse 15 tonnes',
                    'compteur_heures' => 10000,
                    'statut' => 'Autre',
                    'maintenance' => 0,
                    'cree_le' => now(),
                    'mis_a_jours_le' => now(),
                ]);
    }
}
