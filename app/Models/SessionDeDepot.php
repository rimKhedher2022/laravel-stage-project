<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionDeDepot extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_debut', 'date_fin','type_stage', 'user_id',
    ];

    /**
     * Get the user that owns the SessionDeDepot
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    // code ajouté - 17/06/2023
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
