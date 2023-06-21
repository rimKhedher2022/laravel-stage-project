<?php

namespace Database\Seeders;

use App\Models\MessageDeRappel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageDeRappelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MessageDeRappel::create([
            'titre'=>'rappel info3', 
            'description'=>'envoyez vos info2',
            'etudiant_id'=>'3',
            'user_id'=>'4', //admin
        ]);
    }
}
