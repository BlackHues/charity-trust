<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryAlbumImage extends Model
{
    protected $fillable = [
        'gallery_album_id',
        'image_path',
        'sort_order',
    ];

    public function album(): BelongsTo
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }

    public function url(): string
    {
        $path = str_replace('\\', '/', (string) $this->image_path);

        return '/storage/'.ltrim($path, '/');
    }
}
