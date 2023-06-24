<?php

namespace Database\Seeders;

use App\Enums\RoleType;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user = User::create([
        //     'nom' => 'mohamed',
        //     'prenom' => 'ben ali',
        //     'email' => 'moh@example.com',
        //     'role' => RoleType::Administrateur,
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        // ]);

         DB::table('users')->insert([
            'nom' => 'mohamed',
            'prenom' => 'ben ali',
            'role' => RoleType::Administrateur,
            'email' => 'moh@example.com',
            'password' => bcrypt('secret')
        ]);
    }
}
