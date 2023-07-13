<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MessageDeRappel extends Model
{
    use HasFactory;
    protected $fillable = [
      'titre', 'description','stage_id','user_id', 
    ];

    /**
     * Get the user that owns the MessageDeRappel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
     // code ajouté - 17/06/2023
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the MessageDeRappel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

     
     // code ajouté - 17/06/2023
    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }
}
