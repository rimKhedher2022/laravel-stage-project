<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtudiantStage extends Model
{

   
    use HasFactory;
    protected $table = 'etudiant_stage'; // pour lier les deux tables , pour présicer la table 
    protected $fillable = [
        'stage_id',
        'etudiant_id',
        ];
}
