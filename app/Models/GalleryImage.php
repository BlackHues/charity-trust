<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class GalleryImage extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'sort_order',
    ];

    public function url(): string
    {
        return Storage::disk('public')->url($this->image_path);
    }
}
