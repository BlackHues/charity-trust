@php
    $typeLabel = match ((string) ($payload['inquiry_type'] ?? 'enquiry')) {
        'join' => 'Want to join',
        'volunteer' => 'Volunteer',
        'sponsor', 'donor' => 'Sponsor / Donor',
        'institution' => 'Educational institution',
        'enquiry' => 'General enquiry',
        default => ucfirst((string) ($payload['inquiry_type'] ?? 'Enquiry')),
    };
@endphp

@include('emails.partials.mail-start', [
    'pageTitle' => 'We received your message — '.config('app.name'),
    'heading' => 'Thank you for reaching out',
    'subheading' => 'We have received your request and will respond as soon as we can.',
])

                            <p style="margin:0 0 18px;font-size:16px;color:#292524;">
                                Dear <strong style="color:#0f3d3a;">{{ $payload['name'] ?? 'Friend' }}</strong>,
                            </p>
                            <p style="margin:0 0 20px;font-size:15px;color:#57534e;line-height:1.65;">
                                This email confirms that your message was delivered successfully to
                                <strong style="color:#1a5c57;">{{ config('app.name') }}</strong>.
                                Our team will review your details and get in touch with you.
                            </p>

                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom:8px;">
                                <tr>
                                    <td style="padding:14px 16px;background-color:#faf6f1;border-radius:10px;border-left:4px solid #2d8a82;">
                                        <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#1a5c57;text-transform:uppercase;letter-spacing:0.08em;">Your request</p>
                                        <p style="margin:0;font-size:16px;font-weight:600;color:#0f3d3a;">{{ $typeLabel }}</p>
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #f0e8dc;">
                                        <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:0.06em;">Phone</p>
                                        <p style="margin:0;font-size:15px;color:#292524;">{{ $payload['phone'] ?? '—' }}</p>
                                    </td>
                                </tr>
                                @if (! empty($payload['email']))
                                    <tr>
                                        <td style="padding:12px 0;border-bottom:1px solid #f0e8dc;">
                                            <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:0.06em;">Email</p>
                                            <p style="margin:0;font-size:15px;color:#292524;">{{ $payload['email'] }}</p>
                                        </td>
                                    </tr>
                                @endif
                            </table>

                            @if (! empty($payload['message']))
                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin:16px 0 0;">
                                    <tr>
                                        <td style="padding:16px;background-color:#faf6f1;border-radius:10px;border:1px solid #f0e8dc;">
                                            <p style="margin:0 0 8px;font-size:11px;font-weight:700;color:#1a5c57;text-transform:uppercase;letter-spacing:0.06em;">Message you sent</p>
                                            <p style="margin:0;font-size:15px;color:#44403c;line-height:1.6;white-space:pre-wrap;">{{ $payload['message'] }}</p>
                                        </td>
                                    </tr>
                                </table>
                            @endif

                            <p style="margin:24px 0 0;font-size:14px;color:#57534e;line-height:1.65;">
                                With gratitude,<br>
                                <span style="font-family:Georgia,'Times New Roman',serif;font-size:16px;font-weight:600;color:#0f3d3a;">{{ config('app.name') }}</span>
                            </p>

@include('emails.partials.mail-end', ['footerVariant' => 'visitor'])
