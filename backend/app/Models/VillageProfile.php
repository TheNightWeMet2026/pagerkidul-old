<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        'village_name',
        'description',
        'vision',
        'missions',
        'address',
        'phone',
        'email',
        'service_hours',
        'profile_image',
    ];
}