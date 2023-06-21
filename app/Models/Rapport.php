<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rapport extends Model
{


    use HasFactory;
    protected $fillable = [
        'filePath',
        'titre',
        'date_depot',
        'stage_id',
        ];
    
        /**
         * Get the user that owns the Rapport
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */

        // code ajouté - 17/06/2023
        public function stage(): BelongsTo
        {
            return $this->belongsTo(Stage::class);
        }



}
