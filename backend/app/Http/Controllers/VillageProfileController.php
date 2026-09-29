<?php

namespace App\Http\Controllers;

use App\Models\VillageProfile;
use Illuminate\View\View;

class VillageProfileController extends Controller
{
    public function index(): View
    {
        $profile = VillageProfile::query()->first();

        return view('profile.index', compact('profile'));
    }
}