<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryAlbum extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'full_description',
        'sort_order',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(GalleryAlbumImage::class)->orderBy('sort_order')->orderBy('id');
    }

    public function coverImage(): ?GalleryAlbumImage
    {
        return $this->images()->first();
    }
}
