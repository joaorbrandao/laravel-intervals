<?php

namespace JoaoBrandao\LaravelFilters\Tests;

use JoaoBrandao\LaravelIntervals\Facades\LaravelIntervals;
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
            'JoaoBrandao\LaravelIntervals\LaravelIntervalsServiceProvider',
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
            'LaravelIntervals' =>  'JoaoBrandao\LaravelIntervals\Facades\LaravelIntervals',
        ];
    }
    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {

    }
}
