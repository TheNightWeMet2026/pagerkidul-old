<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potential extends Model
{
    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}