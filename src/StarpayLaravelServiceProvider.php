<?php

namespace Nekoding\StarpayLaravel;

use Illuminate\Support\ServiceProvider;

class StarpayLaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'nekoding');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'nekoding');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/starpay-laravel.php', 'starpay-laravel');

        // Register the service the package provides.
        $this->app->singleton('starpay-laravel', function ($app) {
            return new StarpayLaravel;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['starpay-laravel'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/starpay-laravel.php' => config_path('starpay-laravel.php'),
        ], 'starpay-laravel.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/nekoding'),
        ], 'starpay-laravel.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/nekoding'),
        ], 'starpay-laravel.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/nekoding'),
        ], 'starpay-laravel.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
