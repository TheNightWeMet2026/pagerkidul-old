<?php

namespace App\Http\Controllers;

use App\Models\Potential;
use Illuminate\View\View;

class PotentialController extends Controller
{
    public function index(): View
    {
        $potentials = Potential::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get();

        return view('potentials.index', compact('potentials'));
    }
}