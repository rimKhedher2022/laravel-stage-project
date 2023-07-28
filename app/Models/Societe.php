<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Societe extends Model
{


    use HasFactory;
    protected $fillable = [
        'nom',
        'telephone',
        'adresse',
        'ville',
        'validation_state',
        ];


  
   /**
    * Get all of the stages for the Societe
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    // code ajouté - 17/06/2023
   public function stages(): HasMany
   {
       return $this->hasMany(Stage::class);
   }
}
