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
                    'Num_Machine' => '1',
                    'marque' => 'Caterpillar',
                    'modele' => '320',
                    'description' => 'Pelle hydraulique sur chenilles',
                    'compteur_heures' => 1500,
                    'statut' => 'Loué',
                    'maintenance' => 0,
                    'cree_le' => now(),
                    'mis_a_jours_le' => now(),
                ]);

                // Créez un utilisateur de test
                DB::table('engins')->insert([
                    'categorie' => 'Mini Pelle',
                    'Num_Machine' => '1',
                    'marque' => 'Caterpillar',
                    'modele' => '123',
                    'description' => 'Mini pelle hydraulique sur chenilles',
                    'compteur_heures' => 500,
                    'statut' => 'Loué',
                    'maintenance' => 0,
                    'cree_le' => now(),
                    'mis_a_jours_le' => now(),
                ]);
    }
}
