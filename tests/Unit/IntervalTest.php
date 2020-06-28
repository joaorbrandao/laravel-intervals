<?php

namespace Joaorbrandao\LaravelIntervals\Tests\Unit;

use App\LaravelIntervals\Last365Days;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Joaorbrandao\LaravelIntervals\Facades\LaravelIntervals;
use Joaorbrandao\LaravelIntervals\Interval;
use Joaorbrandao\LaravelIntervals\Tests\TestCase;
use Carbon\Carbon;


class IntervalTest extends TestCase
{
    protected $intervalConfig;
    protected $interval;

    protected function setUp() : void
    {
        parent::setUp();
        $this->intervalConfig = (new Last365Days())->resolve();
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
    public function the_obtained_interval_property_end_can_be_changed()
    {
        $beforeChange = $this->interval->end;
        $this->interval->end = Carbon::now()->addHour();
        $this->assertNotEquals($beforeChange, $this->interval->end);
    }

    /**
     * @test
     */
    public function the_obtained_interval_property_id_can_be_changed()
    {
        $beforeChange = $this->interval->id;
        $this->interval->id = 'id';
        $this->assertNotEquals($beforeChange, $this->interval->id);
    }

    /**
     * @test
     */
    public function the_obtained_interval_property_name_can_be_changed()
    {
        $beforeChange = $this->interval->name;
        $this->interval->name = 'name';
        $this->assertNotEquals($beforeChange, $this->interval->name);
    }

    /**
     * @test
     */
    public function the_obtained_interval_property_start_can_be_changed()
    {
        $beforeChange = $this->interval->start;
        $this->interval->start = Carbon::now();
        $this->assertNotEquals($beforeChange, $this->interval->start);
    }

    /**
     * @test
     */
    public function the_obtained_interval_property_enabled_can_not_be_changed()
    {
        $this->expectException('Error');

        $this->interval->enabled = true;
    }
    /**
     * @test
     */
    public function an_interval_contains_a_given_time_between_its_start_and_end()
    {
        $this->assertTrue($this->interval->contains(now()->subMonths(6)));
        $this->assertFalse($this->interval->notContains(now()->subMonths(6)));
    }

    /**
     * @test
     */
    public function an_interval_does_not_contain_a_given_time_that_is_not_between_its_start_and_end()
    {
        $this->assertFalse($this->interval->contains(now()->addMonth()));
        $this->assertTrue($this->interval->notContains(now()->addMonth()));
    }

    /**
     * @test
     */
    public function an_interval_is_automatically_encoded_to_json()
    {
        $this->assertJson($this->interval->toJson());
    }

    /**
     * @test
     */
    public function an_interval_can_be_exported_to_native_date_interval()
    {
        $this->assertInstanceOf(\DateInterval::class, $this->interval->toDateInterval());
    }
}
