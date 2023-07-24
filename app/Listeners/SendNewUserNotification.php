<?php

namespace App\Listeners;

use App\Enums\RoleType;
use App\Events\NewUserRegistered;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class SendNewUserNotification
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
    public function handle(NewUserRegistered $event): void
    {
        $admins = User::whereHas('role',RoleType::Administrateur)->get() ; 
      
        FacadesNotification::send($admins,new NewUserNotification($event->user)) ;
    }
}
