@php
    $pageTitle = $pageTitle ?? config('app.name');
    $heading = $heading ?? '';
    $subheading = $subheading ?? null;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $pageTitle }}</title>
</head>
<body style="margin:0;padding:0;background-color:#f0e8dc;-webkit-font-smoothing:antialiased;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="background-color:#f0e8dc;">
        <tr>
            <td align="center" style="padding:32px 16px;">
                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;width:100%;background-color:#ffffff;border-radius:16px;overflow:hidden;border:1px solid #e8dfd0;box-shadow:0 8px 32px rgba(15,61,58,0.08);">
                    <tr>
                        <td style="background:linear-gradient(135deg,#0f3d3a 0%,#1a5c57 42%,#2d8a82 100%);padding:28px 24px 26px;text-align:center;">
                            <img
                                src="{{ asset('images/logo.png') }}"
                                alt="{{ config('app.name') }}"
                                width="200"
                                style="max-width:200px;width:100%;height:auto;display:block;margin:0 auto 18px;border:0;outline:none;"
                            >
                            <p style="margin:0;font-family:Georgia,'Times New Roman',serif;font-size:21px;font-weight:600;color:#ffffff;letter-spacing:0.02em;line-height:1.3;">
                                {{ $heading }}
                            </p>
                            @if (filled($subheading))
                                <p style="margin:12px 0 0;font-family:Arial,Helvetica,sans-serif;font-size:14px;line-height:1.5;color:rgba(255,255,255,0.9);">
                                    {{ $subheading }}
                                </p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:28px 28px 8px;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:1.65;color:#44403c;">
