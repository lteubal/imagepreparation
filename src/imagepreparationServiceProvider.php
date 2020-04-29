<?php

namespace victorycto\imagepreparation;

use Illuminate\Support\ServiceProvider;

class imagepreparationServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'victorycto');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'victorycto');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/imagepreparation.php', 'imagepreparation');

        // Register the service the package provides.
        $this->app->singleton('imagepreparation', function ($app) {
            return new imagepreparation;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['imagepreparation'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/imagepreparation.php' => config_path('imagepreparation.php'),
        ], 'imagepreparation.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/victorycto'),
        ], 'imagepreparation.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/victorycto'),
        ], 'imagepreparation.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/victorycto'),
        ], 'imagepreparation.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
