<?php


namespace Joaorbrandao\LaravelIntervals;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Joaorbrandao\LaravelIntervals\Contracts\LaravelIntervalsInterface;
use Joaorbrandao\LaravelIntervals\Exceptions\ConfigurationNotFoundException;

class Repository implements LaravelIntervalsInterface
{
    /**
     * Get date time configurations by their names.
     *
     * @param string $name
     * @param array $arguments
     * @return \Joaorbrandao\LaravelIntervals\Interval
     * @throws \Exception
     */
    public function __call($name, $arguments): Interval
    {
        $dateTimeConfig = config("laravel-intervals.intervals.$name");

        if (!$dateTimeConfig) {
            throw new ConfigurationNotFoundException($name);
        }

        return new Interval($dateTimeConfig);
    }

    /**
     * Get all date time configurations.
     *
     * @return Interval[]
     */
    public function all(): array
    {
        $dateTimeConfig = config('laravel-intervals.intervals');

        foreach ($dateTimeConfig as $key => $value) {
            $dateTimeConfig[$key] = new Interval($value);
        }

        return $dateTimeConfig;
    }

    /**
     * Get all date time configurations that are enabled.
     *
     * @return Interval[]
     */
    public function enabled(): array
    {
        $dateTimeConfig = collect(config('laravel-intervals.intervals'))->filter(function ($value, $key) {
            return $value['enabled'] == true;
        })->all();

        foreach ($dateTimeConfig as $key => $value) {
            $dateTimeConfig[$key] = new Interval($value);
        }

        return $dateTimeConfig;
    }

    /**
     * Parse a given start and end times to an Interval.
     *
     * @param $start
     * @param $end
     * @param $id
     * @return Interval
     */
    public function parse($start, $end, $id = 'custom'): Interval
    {
        return new Interval([
            'id' => $id,
            'name' => $id !== null ? Str::snake($id) : $id,
            'start' => Carbon::parse($start),
            'end' => Carbon::parse($end),
            'enabled' => true
        ]);
    }
}