<?php

namespace App\Listeners;

use App\Enums\RoleType;
use App\Models\User;
use App\Notifications\NouveauStageNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SendNouveauStageNotification
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
        $admins = User::where('role',RoleType::Administrateur)->get() ; 
        Notification::send($admins,new NouveauStageNotification ($event->user)) ; 
    }
}
