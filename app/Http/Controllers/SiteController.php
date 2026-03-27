<?php

namespace App\Http\Controllers;

use App\Mail\InquirySubmitted;
use App\Models\GalleryImage;
use App\Models\LeadershipMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Throwable;

class SiteController extends Controller
{
    public function home(): View
    {
        return view('site.home');
    }

    public function about(): View
    {
        return view('site.about');
    }

    public function services(): View
    {
        return view('site.services');
    }

    public function joinUs(Request $request): View
    {
        $selectedType = $this->resolveInquiryType((string) $request->query('intent', 'join'));

        return view('site.join-us', compact('selectedType'));
    }

    public function leadership(): View
    {
        $members = LeadershipMember::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('site.leadership', compact('members'));
    }

    public function gallery(): View
    {
        $images = GalleryImage::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('site.gallery', compact('images'));
    }

    public function donate(): View
    {
        return view('site.donate');
    }

    public function contact(Request $request): View
    {
        $selectedType = $this->resolveInquiryType((string) $request->query('intent', 'enquiry'));

        return view('site.contact', compact('selectedType'));
    }

    public function submitInquiry(Request $request): RedirectResponse
    {
        $types = ['join', 'sponsor', 'volunteer', 'donor', 'institution', 'enquiry'];

        $data = $request->validate([
            'source_page' => ['nullable', 'string', 'max:40'],
            'inquiry_type' => ['required', Rule::in($types)],
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:180'],
            'institution_name' => ['nullable', 'string', 'max:180'],
            'sponsorship_interest' => ['nullable', 'string', 'max:180'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        if ($data['inquiry_type'] === 'institution' && empty($data['institution_name'])) {
            return back()->withInput()->withErrors([
                'institution_name' => 'Institution name is required for educational institution enquiries.',
            ]);
        }

        if (in_array($data['inquiry_type'], ['sponsor', 'donor'], true) && empty($data['sponsorship_interest'])) {
            return back()->withInput()->withErrors([
                'sponsorship_interest' => 'Please choose what you would like to sponsor.',
            ]);
        }

        $recipient = (string) config('site.inquiry_recipient');

        try {
            if ($recipient === '') {
                throw new \RuntimeException('SITE_INQUIRY_RECIPIENT is not configured.');
            }

            Mail::to($recipient)->send(new InquirySubmitted($data));
        } catch (Throwable $e) {
            report($e);

            return back()->withInput()->withErrors([
                'form' => 'Could not send your form right now. Please call or WhatsApp us, and try again shortly.',
            ]);
        }

        return back()->with('status', 'Thank you. We received your request and will contact you soon.');
    }

    private function resolveInquiryType(string $rawIntent): string
    {
        $intent = strtolower(trim($rawIntent));

        return match ($intent) {
            'volunteer' => 'volunteer',
            'sponsor', 'donor', 'donate' => 'sponsor',
            'institution', 'school', 'educational', 'educational-institution' => 'institution',
            'join' => 'join',
            default => 'enquiry',
        };
    }
}
