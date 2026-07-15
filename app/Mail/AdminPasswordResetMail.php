<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminPasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;
    public $admin;
    public $token;
    /**
     * Create a new message instance.
     */
    public function __construct($admin, $token)
    {
        $this->admin = $admin;  
        $this->token = $token;  
    }

    public function build()
    {

        return $this->subject('Admin Password Reset')
                    ->view('emails.admin-password-reset')
                    ->with([
                        'admin' => $this->admin,
                        'resetUrl' => url('/admin/reset-password?token=' . $this->token . '&email=' . urlencode($this->admin->email)),
                        'token' => $this->token
                    ]);
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Admin Password Reset Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin-password-reset',
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
