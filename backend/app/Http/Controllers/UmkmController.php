<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\View\View;

class UmkmController extends Controller
{
    public function index(): View
    {
        $umkms = Umkm::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('product_name')
            ->get();

        return view('umkms.index', compact('umkms'));
    }
}