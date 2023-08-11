<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\MessageDeRappel;
class MessageDeRappelMail extends Mailable
{
    use Queueable, SerializesModels;
    public $Mymessage;
    public  $userEmail;

    /**
     * Create a new message instance.
     */
    public function __construct(MessageDeRappel $message)
    {
        $this->Mymessage = $message;
        $userEmail = auth()->user()->email;
        $userName = auth()->user()->name;
        
        $this->from($userEmail, $userName);
       
    }


   
    public function envelope(): Envelope
    {
        return new Envelope(
            // from: new Address('jeff  rey@example.com', 'Jeffrey Way'),
            subject: 'Message De Rappel Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.message_de_rappel',
            with: [
                'titre' => $this->Mymessage->titre,
                'description' => $this->Mymessage->description,
            ],
           
        )
        ;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
