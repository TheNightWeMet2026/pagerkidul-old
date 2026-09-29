<?php

namespace App\Providers;

use App\Models\VillageProfile;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer(
            ['layouts.*', 'partials.*'],
            function ($view): void {
                $view->with(
                    'profile',
                    VillageProfile::query()->first()
                );
            }
        );
    }
}
