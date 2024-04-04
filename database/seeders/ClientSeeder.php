<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créez un utilisateur de test
        DB::table('clients')->insert([
            'nom' => 'LeBricoleur',
            'prenom' => 'Bob',
            'mail' => 'boblebrocileur@gmail.com',
            'adresse' => '1 rue de la Paix',
            'code_postal' => '75000',
            'ville' => 'Paris',
            'pays' => 'France',
            'telephone' => '+33 6 12 34 56 78',
            'notes' => 'Client fidèle depuis 2015',
            'cree_le' => now(),
        ]);

    }
}
