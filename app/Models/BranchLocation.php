<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchLocation extends Model
{
    protected $fillable = [
        'label',
        'address_lines',
        'is_main',
        'sort_order',
    ];

    /**
     * Address lines as array, splitting on newlines.
     */
    public function lines(): array
    {
        $raw = (string) $this->address_lines;

        return array_values(array_filter(
            array_map('trim', preg_split('/\r\n|\r|\n/', $raw) ?: []),
            static fn (string $line): bool => $line !== ''
        ));
    }
}
