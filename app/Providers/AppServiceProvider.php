<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (config('database.default') === 'sqlite') {
            $dbPath = database_path('database.sqlite');

            // Kalau di Vercel, path-nya harus sesuai env
            if (app()->environment('production')) {
                $dbPath = env('DB_DATABASE');
            }

            if (!File::exists($dbPath)) {
                File::put($dbPath, '');
            }
        }
    }
}
