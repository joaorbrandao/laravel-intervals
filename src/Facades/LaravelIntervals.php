<?php


namespace JoaoBrandao\LaravelIntervals\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelIntervals extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-intervals';
    }
}