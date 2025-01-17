<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Agence;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(AgenceSeeder::class);
        $this->call(RoleSeeder::class);

        $librevilleAgenceId = Agence::where('nom', 'Libreville')->value('id');

        $admin = User::factory()->create([
            'name' => 'Administrateur',
            'email' => 'admin@admin.com',
            'agence_id' => $librevilleAgenceId, // Utilise l'ID du siège
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('admin');

        $superviseur = User::factory()->create([
            'name' => 'Superviseur',
            'email' => 'superviseur@superviseur.com',
            'agence_id' => $librevilleAgenceId, // Utilise l'ID du siège
            'password' => bcrypt('password'),
        ]);
        $superviseur->assignRole('superviseur');
    }
}
