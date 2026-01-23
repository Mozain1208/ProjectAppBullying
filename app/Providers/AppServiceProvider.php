<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share site settings with all views lazily and cache for performance
        view()->composer('*', function ($view) {
            static $settings = null;
            if ($settings === null) {
                try {
                    $settings = \Cache::remember('site_settings', 3600, function() {
                        return \App\Models\SiteSetting::all()->pluck('setting_value', 'setting_key');
                    });
                } catch (\Exception $e) {
                    $settings = collect();
                }
            }
            $view->with('site_settings', $settings);
        });

        // Set timezone
        config(['app.timezone' => 'Asia/Jakarta']);
    }
}
