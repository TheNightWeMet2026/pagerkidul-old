<?php

namespace App\Http\Controllers;

use App\Models\Official;
use App\Models\Potential;
use App\Models\Statistic;
use App\Models\Umkm;
use App\Models\VillageProfile;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $profile = VillageProfile::query()->first();

        $officials = Official::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->take(4)
            ->get();

        $potentials = Potential::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->take(3)
            ->get();

        $umkms = Umkm::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('product_name')
            ->take(3)
            ->get();

        $population = Statistic::query()
            ->where('is_active', true)
            ->where('group', 'gender')
            ->sum('value');

        $officialCount = Official::query()
            ->where('is_active', true)
            ->count();

        $potentialCount = Potential::query()
            ->where('is_active', true)
            ->count();

        $umkmCount = Umkm::query()
            ->where('is_active', true)
            ->count();

        return view('home.index', compact(
            'profile',
            'officials',
            'potentials',
            'umkms',
            'population',
            'officialCount',
            'potentialCount',
            'umkmCount'
        ));
    }
}