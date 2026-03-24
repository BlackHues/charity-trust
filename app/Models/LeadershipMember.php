<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class LeadershipMember extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'qualifications',
        'image_path',
        'sort_order',
    ];

    public function imageUrl(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        return Storage::disk('public')->url($this->image_path);
    }
}
