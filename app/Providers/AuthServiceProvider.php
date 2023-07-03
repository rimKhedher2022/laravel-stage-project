<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Societe;
use App\Models\Stage;
use App\Policies\SocietePolicy;
use App\Policies\StagePolicy;
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
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
