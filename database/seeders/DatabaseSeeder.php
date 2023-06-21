<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\RoleType;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(10)->create();

    
    $this->call([
        EnseignantSeeder::class,
        StageSeeder::class,
        EtudiantSeeder::class,
        EtudiantStageSeeder::class,
        EnseignantStageSeeder::class,
        UserSeeder::class
        // php artisan db:seed
        // les relations bin stage / enseignant / etudiant --> seeder
    ]);
    }
}
