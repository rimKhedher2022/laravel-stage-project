<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StageCree extends Notification
{

    use Queueable;

    private $StageData;

    /**
     * Create a new notification instance.
     */
    public function __construct($StageData)
    {
        $this->StageData = $StageData;
    }


    public function toDatabase($notifiable)
    {
        return [
            'type' => 'stage_created',
            'data' => $this->StageData,
        ];
    }
  
}
