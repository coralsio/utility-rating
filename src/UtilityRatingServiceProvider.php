<?php

namespace Corals\UtilityRating;

use Corals\UtilityRating\Providers\UtilityAuthServiceProvider;
use Corals\UtilityRating\Providers\UtilityRouteServiceProvider;
use Illuminate\Support\ServiceProvider;

class UtilityRatingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'utility-rating');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'utility-rating');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->mergeConfigFrom(
            __DIR__ . '/config/utility-rating.php',
            'utility-rating'
        );
        $this->publishes([
            __DIR__ . '/config/utility-rating.php' => config_path('utility-rating.php'),
            __DIR__ . '/resources/views' => resource_path('resources/views/vendor/utility-rating'),
        ]);
    }

    public function register()
    {
        $this->app->register(UtilityAuthServiceProvider::class);
        $this->app->register(UtilityRouteServiceProvider::class);
    }
}
