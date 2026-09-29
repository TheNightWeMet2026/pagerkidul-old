<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\PotentialController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\VillageProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/profil', [VillageProfileController::class, 'index'])
    ->name('profile.index');

Route::get('/perangkat-desa', [OfficialController::class, 'index'])
    ->name('officials.index');

Route::get('/statistik', [StatisticController::class, 'index'])
    ->name('statistics.index');

Route::get('/potensi', [PotentialController::class, 'index'])
    ->name('potentials.index');

Route::get('/umkm', [UmkmController::class, 'index'])
    ->name('umkms.index');