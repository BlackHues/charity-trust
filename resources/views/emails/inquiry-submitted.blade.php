<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New inquiry</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.5; color: #1f2937;">
    <h2 style="margin-bottom: 12px;">New website inquiry</h2>

    <p><strong>Inquiry type:</strong> {{ ucfirst($payload['inquiry_type']) }}</p>
    <p><strong>Name:</strong> {{ $payload['name'] }}</p>
    <p><strong>Contact number:</strong> {{ $payload['phone'] }}</p>
    @if (! empty($payload['email']))
        <p><strong>Email:</strong> {{ $payload['email'] }}</p>
    @endif
    @if (! empty($payload['institution_name']))
        <p><strong>Institution name:</strong> {{ $payload['institution_name'] }}</p>
    @endif
    @if (! empty($payload['sponsorship_interest']))
        <p><strong>Sponsorship interest:</strong> {{ $payload['sponsorship_interest'] }}</p>
    @endif
    @if (! empty($payload['message']))
        <p><strong>Message:</strong><br>{{ $payload['message'] }}</p>
    @endif
    @if (! empty($payload['source_page']))
        <p><strong>Source page:</strong> {{ $payload['source_page'] }}</p>
    @endif
    <p><strong>Submitted at:</strong> {{ now()->format('d M Y h:i A') }}</p>
</body>
</html>
