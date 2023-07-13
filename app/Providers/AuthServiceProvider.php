<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\SessionDeDepot;
use App\Models\Societe;
use App\Models\Stage;
use App\Policies\SessionDeDepotPolicy;
use App\Policies\SocietePolicy;
use App\Policies\StagePolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Stage::class => StagePolicy::class,
        Societe::class => SocietePolicy::class,
        SessionDeDepot::class => SessionDeDepotPolicy ::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(GateContract $gate): void
    {
        $gate->define('add-rapport', function ($user, $stage) {
            $etudiant = $user->etudiant;
            $stage_etudiants_id = $stage->etudiants->pluck('id')->toArray() ;
          //  dd(in_array($etudiant->id,$stage_etudiants_id));

            return empty($stage->rapport) && in_array($etudiant->id,$stage_etudiants_id) ; // true
        });
    }
}
