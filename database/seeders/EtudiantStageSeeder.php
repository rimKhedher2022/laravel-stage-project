<?php

namespace Database\Seeders;

use App\Models\EtudiantStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtudiantStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtudiantStage::create([
            'stage_id'=>1,
            'etudiant_id'=>2,
        ]);
    }
}
