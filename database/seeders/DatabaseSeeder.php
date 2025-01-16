<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Siege;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Appel du SiegeSeeder
        $this->call(SiegeSeeder::class);

        $librevilleSiegeId = Siege::where('nom', 'Libreville')->value('id');

        User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'admin@admin.com',
            'siege_id' => $librevilleSiegeId, // Utilise l'ID du siège
            'password' => bcrypt('password'),
        ]);
    }
}
