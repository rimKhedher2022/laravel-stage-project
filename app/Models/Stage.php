<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'sujet',
        'date_debut',
        'date_fin',
        'societe_id',
        'etat',
        'date_soutenance',
        // binome id
        ];

        
    
   /**
    * The etudiants that belong to the Stage
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    //ok
   public function etudiants(): BelongsToMany
   {
       return $this->belongsToMany(Etudiant::class); // etudiant_id
   }
 //ok
   public function enseignants(): BelongsToMany
   {
       return $this->belongsToMany(Enseignant::class)->withPivot('role');
   }

//    return $this->belongsToMany(Role::class)->withPivot('active', 'created_by');

    /**
     * Get the societe that owns the Stage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

         // code ajouté - 17/06/2023
    public function societe(): BelongsTo
    {
        return $this->belongsTo(Societe::class);
    }

    /**
     * Get the rapport associated with the Stage
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
     // code ajouté - 17/06/2023
    public function rapport(): HasOne
    {
        return $this->hasOne(Rapport::class);
    }

 
    public function messages() : HasMany
    {
        return $this->hasMany(MessageDeRappel::class);
    }
  

}
