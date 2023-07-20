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

         DB::table('users')->insert([
            'nom' => 'mohamed',
            'prenom' => 'ben ali',
            'role' => RoleType::Administrateur,
            'email' => 'moh@example.com',
            'password' => bcrypt('secret')
        ]);
    }
}
