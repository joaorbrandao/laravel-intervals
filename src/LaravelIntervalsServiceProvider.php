<?php
namespace Joaorbrandao\LaravelIntervals;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Joaorbrandao\LaravelIntervals\Facades\LaravelIntervals;
use Joaorbrandao\LaravelIntervals\Commands\MakeLaravelInterval;

class LaravelIntervalsServiceProvider extends ServiceProvider
{
    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
        // MakeQueryFilter Command
        $this->app->bind('command.make:interval', MakeLaravelInterval::class);
        $this->commands([
            'command.make:interval',
        ]);

        $this->publishes([
            __DIR__.'/Intervals' => app_path('LaravelIntervals')
        ], 'laravel-intervals-classes');
    }
    /**
    * Make config publishment optional by merging the config from the package.
    *
    * @return  void
    */
    public function register()
    {
        $this->app->singleton('laravel-intervals', Repository::class);

        // Register Facade Alias.
        $loader = AliasLoader::getInstance();
        $loader->alias('LaravelIntervals', LaravelIntervals::class);
    }
}
