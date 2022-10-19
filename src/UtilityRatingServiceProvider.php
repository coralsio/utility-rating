<?php

namespace Corals\UtilityRating;

use Corals\Settings\Facades\Modules;
use Corals\Settings\Facades\Settings;
use Corals\User\Communication\Facades\CoralsNotification;
use Corals\UtilityRating\Classes\RatingManager;
use Corals\UtilityRating\Commands\RatingCalculator;
use Corals\UtilityRating\Models\Rating;
use Corals\UtilityRating\Notifications\RateCreated;
use Corals\UtilityRating\Notifications\RatingToggleStatus;
use Corals\UtilityRating\Providers\UtilityAuthServiceProvider;
use Corals\UtilityRating\Providers\UtilityRouteServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class UtilityRatingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'utility-rating');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'utility-rating');

        $this->mergeConfigFrom(
            __DIR__ . '/config/utility-rating.php',
            'utility-rating'
        );
        $this->publishes([
            __DIR__ . '/config/utility-rating.php' => config_path('utility-rating.php'),
            __DIR__ . '/resources/views' => resource_path('resources/views/vendor/utility-rating'),
        ]);

        $this->registerMorphMaps();
        $this->registerCommand();
        $this->registerModulesPackages();

        $this->addEvents();
    }

    public function register()
    {
        $this->app->register(UtilityAuthServiceProvider::class);
        $this->app->register(UtilityRouteServiceProvider::class);

        $this->app->booted(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('RatingManager', RatingManager::class);
        });
    }

    protected function registerCommand()
    {
        $this->commands(RatingCalculator::class);

    }

    protected function registerMorphMaps()
    {
        Relation::morphMap([
            'UtilityRating' => Rating::class,
        ]);
    }

    protected function registerModulesPackages()
    {
        Modules::addModulesPackages('corals/utility-rating');
    }

    protected function addEvents()
    {
        CoralsNotification::addEvent(
            'notifications.rate.rate_created',
            'Rate Created',
            RateCreated::class);

        CoralsNotification::addEvent(
            'notifications.rate.rate_toggle_status',
            'Rate Toggle Status',
            RatingToggleStatus::class);
    }
}
