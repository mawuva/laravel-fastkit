<?php

namespace Mawuekom\Fastkit;

use Illuminate\Support\ServiceProvider;

class FastkitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-fastkit');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-fastkit');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                //__DIR__.'/../config/config.php' => config_path('laravel-fastkit.php'),
                base_path('vendor/spatie/laravel-query-builder/config/query-builder.php') =>config_path('query-builder.php'),
                base_path('vendor/spatie/laravel-json-api-paginate/config/json-api-paginate.php') =>config_path('json-api-paginate.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-fastkit'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-fastkit'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-fastkit'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        //$this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-fastkit');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-fastkit', function () {
            return new Fastkit;
        });

        $this ->app ->register('Fruitcake\Cors\CorsServiceProvider');
        $this ->app ->register('Urameshibr\Providers\FormRequestServiceProvider');
        $this ->app ->register('Mawuekom\DataRepository\DataRepositoryServiceProvider');
    }
}
