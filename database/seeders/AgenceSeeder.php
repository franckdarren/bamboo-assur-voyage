<?php

namespace Database\Seeders;

use App\Models\Agence;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agence::create([
            'nom' => 'Libreville',
            'localisation' => '',
        ]);

        Agence::create([
            'nom' => 'Port Gentil',
            'localisation' => '',
        ]);

        Agence::create([
            'nom' => 'Makokou',
            'localisation' => '',
        ]);

        Agence::create([
            'nom' => 'Mouila',
            'localisation' => '',
        ]);
    }
}
