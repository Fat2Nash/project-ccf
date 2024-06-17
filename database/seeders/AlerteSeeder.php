<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlerteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('typealerte')->insert([
            'nom_alerte' => 'maintenance',
            'description' => 'Maintenance Systematique de l\'engin',
        ]);
        DB::table('typealerte')->insert([
            'nom_alerte' => 'Tension batterie',
            'description' => 'Alerte en cas de tension de batterie faible',
        ]);


    }
}
