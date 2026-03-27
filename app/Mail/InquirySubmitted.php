<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InquirySubmitted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param array<string, mixed> $payload
     */
    public function __construct(
        public array $payload,
    ) {
    }

    public function envelope(): Envelope
    {
        $type = ucfirst((string) ($this->payload['inquiry_type'] ?? 'Enquiry'));
        $name = (string) ($this->payload['name'] ?? 'Website visitor');

        return new Envelope(
            subject: "Website {$type} form: {$name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.inquiry-submitted',
        );
    }
}
