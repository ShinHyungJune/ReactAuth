<?php

namespace hyungjune\ReactAuth;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class ReactAuthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'hyungjune');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'hyungjune');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }

        Schema::defaultStringLength(191);

        PresetCommand::macro("reactAuth", function($command){
            Preset::install();
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/reactauth.php', 'reactauth');

        // Register the service the package provides.
        $this->app->singleton('reactauth', function ($app) {
            return new ReactAuth;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['reactauth'];
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
            __DIR__.'/../config/reactauth.php' => config_path('reactauth.php'),
        ], 'reactauth.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/hyungjune'),
        ], 'reactauth.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/hyungjune'),
        ], 'reactauth.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/hyungjune'),
        ], 'reactauth.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
