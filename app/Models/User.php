<?php

namespace App\Models;

use App\Enums\RoleType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom', 'prenom', 'email','password','image','role','annee-scolaire'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role'=> RoleType::class,
    ];

    public function etudiant(): HasOne
    {
        return $this->hasOne(Etudiant::class);
    }

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function enseignant(): HasOne
    {
        return $this->hasOne(Enseignant::class);
    }


    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     // code ajouté - 17/06/2023
    public function sessions(): HasMany
    {
        return $this->hasMany(SessionDeDepot::class);
    }
    

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     // code ajouté - 17/06/2023
     public function messages(): HasMany
     {
         return $this->hasMany(MessageDeRappel::class)->orderBy('created_at', 'desc');
     }

     public function messagesCount()
     {
        if (auth()->user()->role->value === 'etudiant')
        {
            $count =0 ;
            $etudiant_stages = auth()->user()->etudiant->stages;
            foreach ($etudiant_stages as $stage)
            {
                $count+= count($stage->messages);
            }

            return $count ; 
            
        }
     }
    

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
