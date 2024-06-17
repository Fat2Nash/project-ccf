<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'nom' => 'Admin',
            'prenom' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('azertyuiop'),
            'role' => 'Administrateur',
        ]);
        User::create([
            'nom' => 'Bob',
            'prenom' => 'LeBricoleur',
            'email' => 'bob.lebricoleur@gmail.com',
            'password' => Hash::make('azertyuiop'),
            'role' => 'Mecanitien/Chauffeur'
        ]);
        User::create([
            'nom' => 'Yanik',
            'prenom' => 'Kasim',
            'email' => 'kastroooper@gmail.com',
            'password' => Hash::make('azertyuiop'),
            'role' => 'Responsable',
        ]);
    }
}
