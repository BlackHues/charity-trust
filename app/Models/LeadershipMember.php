<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

        $path = str_replace('\\', '/', $this->image_path);

        return '/storage/'.ltrim($path, '/');
    }
}
