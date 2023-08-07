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
    public $message;

    /**
     * Create a new message instance.
     */
    public function __construct(MessageDeRappel $message)
    {
        $this->message = $message;
        //  dd($this->message->titre, $this->message->description);
    }


    // public function build()
    // {

    //     // dd($this->message->titre, $this->message->description);
    //     return $this->view('emails.message_de_rappel')
    //                 ->subject('Rappel de dépôt')
    //                 ->with([
    //                     'titre' => $this->message->titre,
    //                     'description' => $this->message->description,
    //                 ]);
    // }
    /**
     * Get the message envelope.
     */
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
                'titre' => $this->message->titre,
                'description' => $this->message->description,
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
