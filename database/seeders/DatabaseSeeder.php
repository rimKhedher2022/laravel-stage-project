<?php

namespace Database\Seeders;
use App\Enums\RoleType;
use App\Models\Enseignant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([ 
        //     'nom' => 'admin',
        //     'prenom' => 'Admin',
           
        //     'email' => 'admin@argon.com',
        //     'password' => bcrypt('secret') // 
// register : les champs  postman
        $this->call([
            EnseignantSeeder::class,
            StageSeeder::class,
            RapportSeeder::class,
            EtudiantSeeder::class,
            // EtudiantStageSeeder::class,
            // EnseignantStageSeeder::class,
            UserSeeder::class,
            SessionDeDepotSeeder::class,
            MessageDeRappelSeeder::class,
            // php artisan db:seed
            // les relations bin stage / enseignant / etudiant --> seeder
        ]);
    }
}
