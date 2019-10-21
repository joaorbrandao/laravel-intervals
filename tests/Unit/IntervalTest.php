<?php

namespace Joaorbrandao\LaravelIntervals\Tests\Unit;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Joaorbrandao\LaravelIntervals\Facades\LaravelIntervals;
use Joaorbrandao\LaravelIntervals\Interval;
use Joaorbrandao\LaravelIntervals\Tests\TestCase;


class IntervalsTest extends TestCase
{
    protected $intervalConfig;
    protected $interval;

    protected function setUp() : void
    {
        parent::setUp();
        $this->intervalConfig = config('laravel-intervals.intervals.last365Days');
        $this->interval = new Interval($this->intervalConfig);
    }

    /**
     * @test
     */
    public function the_obtained_interval_can_check_if_config_is_enabled()
    {
        $this->assertTrue($this->interval->isEnabled());
    }

    /**
     * @test
     */
    public function the_obtained_interval_properties_cannot_be_reset()
    {
        $this->expectException('Error');

        $this->interval->start = 1;
    }

    /**
     * @test
     */
    public function an_interval_contains_a_given_time_between_its_start_and_end()
    {
        $this->assertTrue($this->interval->contains(now()->subMonths(6)));
    }

    /**
     * @test
     */
    public function an_interval_does_not_contain_a_given_time_that_is_not_between_its_start_and_end()
    {
        $this->assertFalse($this->interval->contains(now()->addMonth()));
    }

    /**
     * @test
     */
    public function an_interval_is_automatically_encoded_to_json()
    {
        $this->assertJson($this->interval->toJson());
    }
}
