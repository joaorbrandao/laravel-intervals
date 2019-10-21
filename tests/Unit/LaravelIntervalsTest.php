<?php

namespace Joaorbrandao\LaravelIntervals\Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Joaorbrandao\LaravelIntervals\Facades\LaravelIntervals;
use Joaorbrandao\LaravelIntervals\Interval;
use Joaorbrandao\LaravelIntervals\Tests\TestCase;
use Orchestra\Testbench\Contracts\Laravel;


class LaravelIntervalsTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
    }

    /**
     * @test
     */
    public function obtain_all_configurations()
    {
        $dateTime = LaravelIntervals::all();

        $allFromConfig = config('laravel-intervals.intervals');

        $this->assertEquals(count($allFromConfig), count($dateTime));
    }

    /**
     * @test
     */
    public function get_only_the_enabled_configurations()
    {
        $dateTime = LaravelIntervals::enabled();

        $allFromConfig = collect(config('laravel-intervals.intervals'));

        $enabledFromConfig = $allFromConfig->filter(function($value, $key){
            return $value['enabled'] === true;
        })->count();

        $this->assertEquals($enabledFromConfig, count($dateTime));
    }

    /**
     * @test
     */
    public function call_config_options_using_facade()
    {
        $allFromConfig = config('laravel-intervals.intervals');

        foreach ($allFromConfig as $key => $value)
        {
            $dateTime = LaravelIntervals::$key();

            $dateTimeStart = $dateTime->start;
            $dateTimeEnd = $dateTime->end;

            $itemFromConfig = config("laravel-intervals.intervals.$key");
            $itemStart = $itemFromConfig['start']->toDateTimeString();
            $itemEnd = $itemFromConfig['end']->toDateTimeString();

            $this->assertEquals($itemStart, $dateTimeStart);
            $this->assertEquals($itemEnd, $dateTimeEnd);
        }
    }

    /**
     * @test
     */
    public function the_result_of_the_facade_is_an_instance_of_interval_class()
    {
        $interval = LaravelIntervals::last365Days();

        $this->assertInstanceOf(Interval::class, $interval);
    }

    /**
     * @test
     */
    public function the_result_can_automatically_be_encoded_to_json()
    {
        $this->assertJson(LaravelIntervals::last365Days()->toJson());
    }
}
