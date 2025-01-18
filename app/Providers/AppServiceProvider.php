<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Ngrok
        // if (env(key: 'APP_ENV') !== 'local') {
        //     URL::forceScheme(scheme: 'https');
        // }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Forcer la locale PHP sur la locale française pour les dates
        setlocale(LC_TIME, 'fr_FR.utf8', 'fr_FR', 'fr', 'fra'); // Essaye plusieurs variantes de la locale
        Carbon::setLocale('fr');
    }
}
