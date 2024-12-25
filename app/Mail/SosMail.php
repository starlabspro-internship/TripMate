<?php

namespace App\Mail;

use App\Models\SosAlert;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SosMail extends Mailable
{
    use Queueable, SerializesModels;

    public SosAlert $sosAlert;

    /**
     * Create a new message instance.
     */
    public function __construct(SosAlert $sosAlert)
    {
        $this->sosAlert = $sosAlert;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sos Alert',
            from: config('mail.from.address'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.sos-mail',
            with: ['sosAlert' => $this->sosAlert],
        );
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