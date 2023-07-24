<?php

namespace App\Listeners;

use App\Enums\RoleType;
use App\Models\User;
use App\Notifications\NewStageCreeSansDepotNotification;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;


class SendNouveauStageCreeNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $admins = User::whereHas('role',RoleType::Administrateur)->get() ; 
      
        Notification::send($admins,new NewStageCreeSansDepotNotification($event->user)) ; 

    }
}
