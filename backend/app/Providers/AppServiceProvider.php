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
                try {
                    $profile = VillageProfile::query()->first();
                } catch (\Throwable) {
                    // Database not migrated yet (fresh install, console, tests):
                    // render with no profile instead of crashing every page.
                    $profile = null;
                }

                $view->with('profile', $profile);
            }
        );
    }
}
