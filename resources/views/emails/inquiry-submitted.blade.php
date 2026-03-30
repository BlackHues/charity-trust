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
    'pageTitle' => 'New inquiry — '.config('app.name'),
    'heading' => 'New inquiry received',
    'subheading' => 'Someone submitted a request through your website form.',
])

                            <p style="margin:0 0 20px;font-size:15px;color:#57534e;">
                                Here are the details. You can reply directly to this email if the visitor provided an address.
                            </p>

                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom:8px;">
                                <tr>
                                    <td style="padding:14px 16px;background-color:#faf6f1;border-radius:10px;border-left:4px solid #2d8a82;">
                                        <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#1a5c57;text-transform:uppercase;letter-spacing:0.08em;">Inquiry type</p>
                                        <p style="margin:0;font-size:16px;font-weight:600;color:#0f3d3a;">{{ $typeLabel }}</p>
                                    </td>
                                </tr>
                            </table>

                            <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom:8px;">
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #f0e8dc;">
                                        <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:0.06em;">Name</p>
                                        <p style="margin:0;font-size:15px;color:#292524;">{{ $payload['name'] }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:12px 0;border-bottom:1px solid #f0e8dc;">
                                        <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:0.06em;">Contact number</p>
                                        <p style="margin:0;font-size:15px;color:#292524;">{{ $payload['phone'] }}</p>
                                    </td>
                                </tr>
                                @if (! empty($payload['email']))
                                    <tr>
                                        <td style="padding:12px 0;border-bottom:1px solid #f0e8dc;">
                                            <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:0.06em;">Email</p>
                                            <p style="margin:0;font-size:15px;color:#292524;"><a href="mailto:{{ $payload['email'] }}" style="color:#1a5c57;text-decoration:none;">{{ $payload['email'] }}</a></p>
                                        </td>
                                    </tr>
                                @endif
                                @if (! empty($payload['institution_name']))
                                    <tr>
                                        <td style="padding:12px 0;border-bottom:1px solid #f0e8dc;">
                                            <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:0.06em;">Institution name</p>
                                            <p style="margin:0;font-size:15px;color:#292524;">{{ $payload['institution_name'] }}</p>
                                        </td>
                                    </tr>
                                @endif
                                @if (! empty($payload['sponsorship_interest']))
                                    <tr>
                                        <td style="padding:12px 0;border-bottom:1px solid #f0e8dc;">
                                            <p style="margin:0 0 4px;font-size:11px;font-weight:700;color:#78716c;text-transform:uppercase;letter-spacing:0.06em;">Sponsorship interest</p>
                                            <p style="margin:0;font-size:15px;color:#292524;">{{ $payload['sponsorship_interest'] }}</p>
                                        </td>
                                    </tr>
                                @endif
                            </table>

                            @if (! empty($payload['message']))
                                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin:16px 0 0;">
                                    <tr>
                                        <td style="padding:16px;background-color:#faf6f1;border-radius:10px;border:1px solid #f0e8dc;">
                                            <p style="margin:0 0 8px;font-size:11px;font-weight:700;color:#1a5c57;text-transform:uppercase;letter-spacing:0.06em;">Message</p>
                                            <p style="margin:0;font-size:15px;color:#44403c;line-height:1.6;white-space:pre-wrap;">{{ $payload['message'] }}</p>
                                        </td>
                                    </tr>
                                </table>
                            @endif

                            <p style="margin:20px 0 0;font-size:12px;color:#a8a29e;">
                                @if (! empty($payload['source_page']))
                                    <strong style="color:#78716c;">Source:</strong> {{ $payload['source_page'] }}
                                    <span style="color:#d6d3d1;"> &middot; </span>
                                @endif
                                <strong style="color:#78716c;">Submitted:</strong> {{ now()->format('d M Y h:i A') }}
                            </p>

@include('emails.partials.mail-end', ['footerVariant' => 'admin'])
