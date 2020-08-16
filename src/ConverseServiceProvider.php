<?php

namespace Vsellis\Converse;

use Illuminate\Support\ServiceProvider;
use Vsellis\Converse\Commands\ConverseCommand;

class ConverseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-converse.php' => config_path('laravel-converse.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/laravel-converse'),
            ], 'views');

            if (! class_exists('CreatePackageTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_laravel_converse_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_laravel_converse_table.php'),
                ], 'migrations');
            }

            $this->commands([
                ConverseCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-converse');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-converse.php', 'laravel-converse');
    }
}
