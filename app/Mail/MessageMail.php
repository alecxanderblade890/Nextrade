<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessageMail extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    /**
     * Create a new message instance.
     */
    public function __construct($content)
    {
        $this->content = $content; // Store the message content
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address(Auth::user()->email, Auth::user()->first_name . ' ' . Auth::user()->last_name),
            subject: 'NEXTRADE: New Barter Message',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.message' // This refers to resources/views/emails/welcome.blade.php
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Example of an attachment:
            // \Illuminate\Mail\Mailables\Attachment::fromPath(public_path('images/logo.png'))
            //     ->as('app_logo.png')
            //     ->withMime('image/png'),
        ];
    }
}