<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryAlbumImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryAlbumController extends Controller
{
    public function index(): View
    {
        $albums = GalleryAlbum::query()
            ->withCount('images')
            ->with(['images' => fn ($q) => $q->orderBy('sort_order')->orderBy('id')->limit(1)])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.gallery.index', compact('albums'));
    }

    public function create(): View
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:400'],
            'full_description' => ['nullable', 'string', 'max:5000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['required', 'image', 'max:6144'],
        ]);

        DB::transaction(function () use ($request, $data): void {
            $album = GalleryAlbum::query()->create([
                'title' => $data['title'],
                'short_description' => $data['short_description'] ?? null,
                'full_description' => $data['full_description'] ?? null,
                'sort_order' => $data['sort_order'] ?? 0,
            ]);

            foreach ($request->file('images', []) as $index => $file) {
                $path = $file->store('gallery/albums/'.$album->id, 'public');
                $album->images()->create([
                    'image_path' => $path,
                    'sort_order' => $index,
                ]);
            }
        });

        return redirect()->route('admin.gallery.index')->with('status', 'Album created with photos.');
    }

    public function edit(GalleryAlbum $gallery_album): View
    {
        $gallery_album->load(['images' => fn ($q) => $q->orderBy('sort_order')->orderBy('id')]);

        return view('admin.gallery.edit', ['album' => $gallery_album]);
    }

    public function update(Request $request, GalleryAlbum $gallery_album): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:400'],
            'full_description' => ['nullable', 'string', 'max:5000'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'images' => ['nullable', 'array'],
            'images.*' => ['required', 'image', 'max:6144'],
            'image_sort_order' => ['nullable', 'array'],
            'image_sort_order.*' => ['nullable', 'integer', 'min:0'],
            'delete_image_ids' => ['nullable', 'array'],
            'delete_image_ids.*' => ['integer', 'exists:gallery_album_images,id'],
        ]);

        DB::transaction(function () use ($request, $gallery_album, $data): void {
            $gallery_album->update([
                'title' => $data['title'],
                'short_description' => $data['short_description'] ?? null,
                'full_description' => $data['full_description'] ?? null,
                'sort_order' => $data['sort_order'] ?? 0,
            ]);

            $deleteIds = collect($data['delete_image_ids'] ?? [])
                ->map(static fn ($id) => (int) $id)
                ->all();

            if ($deleteIds !== []) {
                $imagesToDelete = GalleryAlbumImage::query()
                    ->where('gallery_album_id', $gallery_album->id)
                    ->whereIn('id', $deleteIds)
                    ->get();

                foreach ($imagesToDelete as $image) {
                    Storage::disk('public')->delete($image->image_path);
                    $image->delete();
                }
            }

            $sortMap = $data['image_sort_order'] ?? [];
            foreach ($sortMap as $imageId => $sortOrder) {
                GalleryAlbumImage::query()
                    ->where('gallery_album_id', $gallery_album->id)
                    ->where('id', (int) $imageId)
                    ->update(['sort_order' => (int) ($sortOrder ?? 0)]);
            }

            $lastSort = (int) $gallery_album->images()->max('sort_order');
            foreach ($request->file('images', []) as $index => $file) {
                $path = $file->store('gallery/albums/'.$gallery_album->id, 'public');
                $gallery_album->images()->create([
                    'image_path' => $path,
                    'sort_order' => $lastSort + $index + 1,
                ]);
            }
        });

        return redirect()->route('admin.gallery.edit', $gallery_album)->with('status', 'Album updated.');
    }

    public function destroy(GalleryAlbum $gallery_album): RedirectResponse
    {
        DB::transaction(function () use ($gallery_album): void {
            foreach ($gallery_album->images as $image) {
                Storage::disk('public')->delete($image->image_path);
            }
            $gallery_album->delete();
        });

        return redirect()->route('admin.gallery.index')->with('status', 'Album deleted.');
    }
}
