@php
    $footerVariant = $footerVariant ?? 'admin';
@endphp
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 28px 28px;background-color:#faf6f1;border-top:1px solid #f0e8dc;">
                            <p style="margin:0 0 10px;font-family:Georgia,'Times New Roman',serif;font-size:15px;font-weight:600;color:#0f3d3a;">
                                {{ config('app.name') }}
                            </p>
                            @if ($footerVariant === 'admin')
                                <p style="margin:0 0 8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#78716c;line-height:1.55;">
                                    Education, healthcare &amp; social welfare for underprivileged communities in Tamil Nadu.
                                </p>
                                <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#a8a29e;line-height:1.5;">
                                    Reply to this email goes to the visitor if they left an email address.
                                </p>
                            @else
                                <p style="margin:0 0 8px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#78716c;line-height:1.55;">
                                    If you need anything urgently, please call or WhatsApp us using the numbers on our website.
                                </p>
                                <p style="margin:0;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#a8a29e;line-height:1.5;">
                                    This is an automated confirmation — please do not reply with sensitive personal data.
                                </p>
                            @endif
                        </td>
                    </tr>
                </table>
                <p style="margin:16px 0 0;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#a8a29e;text-align:center;">
                    &copy; {{ now()->year }} {{ config('app.name') }}
                </p>
            </td>
        </tr>
    </table>
</body>
</html>
