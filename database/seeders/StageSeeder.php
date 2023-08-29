<?php

namespace Database\Seeders;

use App\Enums\StageType;
use App\Models\Societe;
use App\Models\Stage;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $societe = Societe::create([
            'nom'=>'iset',
            'telephone'=>'25252525',
            'adresse'=>'rue rue exemple',
            'pays'=>'Tunisie',
            'fax'=>'73737373',
            'ville'=>'sousse',
            'email'=>'gb@gmail.com',
           
        ]);
      
        $stage = Stage::create([
            'type' => StageType::Ouvrier,
            'sujet'=>'sujet1',
            'date_debut'=>Carbon::now(),
            'date_fin'=>Carbon::now()->addMonth(),
            'societe_id'=>$societe->id,
        ]);
    }
}
