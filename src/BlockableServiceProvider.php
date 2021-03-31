<?php

namespace Hareku\LaravelBlockable;

use Illuminate\Support\ServiceProvider;

class BlockableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            \dirname(__DIR__) . '/config/blockable.php' => config_path('blockable.php'),
        ], 'config');

        $this->publishes([
            \dirname(__DIR__) . '/migrations/' => database_path('migrations'),
        ], 'migrations');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(\dirname(__DIR__) . '/migrations/');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            \dirname(__DIR__) . '/config/blockable.php',
            'blockable'
        );
    }
}
