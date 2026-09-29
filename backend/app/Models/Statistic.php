<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'group',
        'label',
        'value',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'value' => 'integer',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}