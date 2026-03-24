<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryImageController extends Controller
{
    public function index(): View
    {
        $images = GalleryImage::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.gallery.index', compact('images'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::query()->create([
            'title' => $data['title'] ?? null,
            'image_path' => $path,
            'sort_order' => $data['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.gallery.index')->with('status', 'Image added.');
    }

    public function edit(GalleryImage $gallery_image): View
    {
        return view('admin.gallery.edit', ['image' => $gallery_image]);
    }

    public function update(Request $request, GalleryImage $gallery_image): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery_image->image_path);
            $gallery_image->image_path = $request->file('image')->store('gallery', 'public');
        }

        $gallery_image->title = $data['title'] ?? null;
        $gallery_image->sort_order = $data['sort_order'] ?? 0;
        $gallery_image->save();

        return redirect()->route('admin.gallery.index')->with('status', 'Image updated.');
    }

    public function destroy(GalleryImage $gallery_image): RedirectResponse
    {
        Storage::disk('public')->delete($gallery_image->image_path);
        $gallery_image->delete();

        return redirect()->route('admin.gallery.index')->with('status', 'Image removed.');
    }
}
