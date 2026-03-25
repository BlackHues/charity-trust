<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'sort_order',
    ];

    /** Public URL for the file on the public disk (root-relative). */
    public function url(): string
    {
        if (! $this->image_path) {
            return '';
        }

        $path = str_replace('\\', '/', $this->image_path);

        return '/storage/'.ltrim($path, '/');
    }
}
