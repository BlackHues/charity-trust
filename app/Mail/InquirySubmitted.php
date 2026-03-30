<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
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
        $name = (string) ($this->payload['name'] ?? 'Website visitor');
        $label = $this->inquiryTypeLabel();
        $replyTo = [];

        if (! empty($this->payload['email'])) {
            $replyTo[] = new Address((string) $this->payload['email'], $name);
        }

        return new Envelope(
            subject: "New inquiry — {$label} · {$name}",
            replyTo: $replyTo,
        );
    }

    private function inquiryTypeLabel(): string
    {
        return match ((string) ($this->payload['inquiry_type'] ?? 'enquiry')) {
            'join' => 'Want to join',
            'volunteer' => 'Volunteer',
            'sponsor', 'donor' => 'Sponsor / Donor',
            'institution' => 'Educational institution',
            'enquiry' => 'General enquiry',
            default => ucfirst((string) ($this->payload['inquiry_type'] ?? 'Enquiry')),
        };
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.inquiry-submitted',
        );
    }
}
