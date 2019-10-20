<?php

namespace Joaorbrandao\LaravelIntervals\Tests;

use Joaorbrandao\LaravelIntervals\Facades\LaravelIntervals;
use Orchestra\Testbench\TestCase as Orchestra;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends Orchestra
{
    protected function setUp() : void
    {
        parent::setUp();
    }
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            'Joaorbrandao\LaravelIntervals\LaravelIntervalsServiceProvider',
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * 
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'laravel-intervals' =>  LaravelIntervals::class,
        ];
    }
    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {

    }
}
