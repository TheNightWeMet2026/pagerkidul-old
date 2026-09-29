<?php

namespace App\Http\Controllers;

use App\Models\Official;
use Illuminate\View\View;

class OfficialController extends Controller
{
    public function index(): View
    {
        $officials = Official::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $chief = $officials->firstWhere('position', 'Kepala Desa');

        if (! $chief) {
            $chief = $officials->first();
        }

        $staff = $officials->reject(
            fn (Official $official) => $chief && $official->id === $chief->id
        );

        return view('officials.index', compact('chief', 'staff'));
    }
}