<?php

namespace Database\Seeders;

use App\Models\Siege;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siege::create([
            'nom' => 'Libreville',
            'localisation' => '',
        ]);

        Siege::create([
            'nom' => 'Port Gentil',
            'localisation' => '',
        ]);

        Siege::create([
            'nom' => 'Makokou',
            'localisation' => '',
        ]);

        Siege::create([
            'nom' => 'Mouila',
            'localisation' => '',
        ]);
    }
}
