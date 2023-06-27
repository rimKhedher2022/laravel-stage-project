<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnseignantStage extends Model
{


    use HasFactory;
    protected $table = 'enseignant_stage';
    protected $fillable = [
        'stage_id',
        'enseignant_id',
        'role',
        ];
}
