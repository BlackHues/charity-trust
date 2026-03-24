<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use App\Models\LeadershipMember;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'galleryCount' => GalleryImage::query()->count(),
            'leadershipCount' => LeadershipMember::query()->count(),
        ]);
    }
}
