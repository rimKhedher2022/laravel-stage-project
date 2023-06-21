<?php

namespace Database\Seeders;

use App\Models\EnseignantStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnseignantStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EnseignantStage::create([
            'stage_id'=>'1',
            'enseignant_id'=>'1',
            'role'=>'role1',
        ]);
    }
}
