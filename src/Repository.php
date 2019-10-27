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
    public function __call($name, $arguments)
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
     * @return \Illuminate\Config\Repository|mixed
     */
    public function all()
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
     * @return array
     */
    public function enabled()
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
    public function parse($start, $end, $id = 'custom')
    {
        return new Interval([
            'id' => $id,
            'name' => $id !== null ? Str::snake($id) : $id,
            'start' => $start,
            'end' => $end,
            'enabled' => true
        ]);
    }
}