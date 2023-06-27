<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Etudiant extends Model
{
    use HasFactory;

  
    protected $fillable = [
        'cin',
        'niveau',
        'specialite',
        'numero_inscription',
        'user_id',
        ];


     /**
     * Get the user that owns the Etudiant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }    


 /**
  * The roles that belong to the Etudiant
  *
  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
  */
 public function stages(): BelongsToMany
 {
     return $this->belongsToMany(Stage::class); // stage_id
 }
   

    /**
     * Get all of the messages for the Etudiant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
     // code ajouté - 17/06/2023
    public function messages(): HasMany
    {
        return $this->hasMany(MessageDeRappel::class);
    }
}
