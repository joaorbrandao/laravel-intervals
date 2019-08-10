<?php

namespace JoaoBrandao\LaravelIntervals\Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use JoaoBrandao\LaravelIntervals\Facades\LaravelIntervals;
use JoaoBrandao\LaravelIntervals\Tests\TestCase;

//use JoaoBrandao\LaravelIntervals\Repository as LaravelIntervals;

class LaravelIntervalsTest extends TestCase
{
    private $laravelIntervals;

    protected function setUp() : void
    {
        parent::setUp();
    }

    public function test_all()
    {
        $dateTime = LaravelIntervals::all();

        $allFromConfig = config('laravel-intervals.intervals');

        $this->assertEquals(count($allFromConfig), count($dateTime));
    }

    public function test_enabled()
    {
        $dateTime = LaravelIntervals::enabled();

        $allFromConfig = collect(config('laravel-intervals.intervals'));

        $enabledFromConfig = $allFromConfig->filter(function($value, $key){
            return $value['enabled'] === true;
        })->count();

        $this->assertEquals($enabledFromConfig, count($dateTime));
    }

    public function test__callStatic()
    {
        $allFromConfig = config('laravel-intervals.intervals');

        foreach ($allFromConfig as $key => $value)
        {
            $dateTime = LaravelIntervals::$key('toDateTimeString');
            $dateTimeStart = $dateTime['start'];
            $dateTimeEnd = $dateTime['end'];

            $itemFromConfig = config("laravel-intervals.intervals.$key");
            $itemStart = $itemFromConfig['start']->toDateTimeString();
            $itemEnd = $itemFromConfig['end']->toDateTimeString();

            $this->assertEquals($itemStart, $dateTimeStart);
            $this->assertEquals($itemEnd, $dateTimeEnd);
        }
    }
}
