<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryAlbumImage;
use App\Models\LeadershipMember;
use App\Models\BranchLocation;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'galleryAlbumCount' => GalleryAlbum::query()->count(),
            'galleryPhotoCount' => GalleryAlbumImage::query()->count(),
            'leadershipCount' => LeadershipMember::query()->count(),
            'branchCount' => BranchLocation::query()->count(),
        ]);
    }
}
