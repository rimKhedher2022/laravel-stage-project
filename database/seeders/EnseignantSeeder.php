<?php

namespace Database\Seeders;

use App\Enums\RoleType;
use App\Models\Enseignant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnseignantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'nom' => 'mariem',
            'prenom' => 'ghanoun',
            'email' => 'mariem@example.com',
            'role' => RoleType::Enseignant,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        Enseignant::create([ // ????
            'matricule'=>'525187',
            'user_id'=> $user->id
        ]);
    }
}
