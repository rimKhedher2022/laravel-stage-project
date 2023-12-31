<?php

namespace App\Listeners;

use App\Enums\RoleType;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

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
    public function handle(object $event)
    {
        $admins = User::where('role',RoleType::Administrateur)->get() ; 
        Notification::send($admins,new NewUserNotification ($event->user)) ; 
    }
}
