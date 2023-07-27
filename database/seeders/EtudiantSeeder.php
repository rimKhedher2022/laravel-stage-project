<?php

namespace Database\Seeders;

use App\Enums\RoleType;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtudiantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user =  DB::table('users')->insert([
        //     'nom' => 'mourad',
        //     'prenom' => 'mourad1',
        //     'email' => 'bien@example.com',
        //     'role' => RoleType::Etudiant,
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        // ]);

        // DB::table('etudiants')->insert([
        //     'cin'=>'12550',
        //     'niveau'=>'3',
        //     'specialite'=>'informatique',
        //     'numero_inscription'=>'4549995',
        //     'user_id'=> $user->id
        // ]);

        $user = User::create([
            'nom' => 'mourad',
            'prenom' => 'mourad1',
            'email' => 'bien@example.com',
            'role' => RoleType::Etudiant,
          
            'password' => bcrypt('secret')
        ]);

        Etudiant::create([
                'cin'=>'12550',
                'niveau'=>'3',
                'specialite'=>'informatique',
                'numero_inscription'=>'4549995',
                'user_id'=> $user->id,
        ]);
    }
}
