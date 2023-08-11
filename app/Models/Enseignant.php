<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricule',
        'grad',
        'user_id',
    ];


    /**
     * Get the user that owns the Enseignant
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
     return $this->belongsToMany(Stage::class)->withPivot('role'); // stage_id
 }
   
}
