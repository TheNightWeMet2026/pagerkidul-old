<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\View\View;

class StatisticController extends Controller
{
    public function index(): View
    {
        $statistics = Statistic::query()
            ->where('is_active', true)
            ->orderBy('group')
            ->orderBy('sort_order')
            ->orderBy('label')
            ->get()
            ->groupBy('group');

        return view('statistics.index', compact('statistics'));
    }
}