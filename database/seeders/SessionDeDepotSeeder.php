<?php

namespace Database\Seeders;

use App\Models\SessionDeDepot;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SessionDeDepotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SessionDeDepot::create([
        'date_debut'=>Carbon::now(), 
        'date_fin'=>Carbon::now()->addMonth(),
        'user_id'=>3,
       ]);
    }
}
