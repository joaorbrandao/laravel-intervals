<?php
namespace Joaorbrandao\LaravelIntervals;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Joaorbrandao\LaravelIntervals\Facades\LaravelIntervals;

class LaravelIntervalsServiceProvider extends ServiceProvider
{
    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/laravel-intervals.php' => config_path('laravel-intervals.php'),
        ], 'laravel-intervals-config');
    }
    /**
    * Make config publishment optional by merging the config from the package.
    *
    * @return  void
    */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/laravel-intervals.php',
            'laravel-intervals'
        );

        $this->app->singleton('laravel-intervals', Repository::class);

        // Register Facade Alias.
        $loader = AliasLoader::getInstance();
        $loader->alias('LaravelIntervals', LaravelIntervals::class);
    }
}