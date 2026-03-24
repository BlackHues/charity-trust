<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use App\Models\LeadershipMember;
use Illuminate\View\View;

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

    public function joinUs(): View
    {
        return view('site.join-us');
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

    public function contact(): View
    {
        return view('site.contact');
    }
}
