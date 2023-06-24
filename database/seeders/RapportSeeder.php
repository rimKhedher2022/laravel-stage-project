<?php

namespace Database\Seeders;

use App\Models\Rapport;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RapportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rapport::create([
        'filePath'=>'/jjdhd/kjdhd/d/f',
        'titre'=>'rapport pfe1',
        'date_depot'=>Carbon::now(),
        'stage_id'=>1,
           ]);
       
    }
}
