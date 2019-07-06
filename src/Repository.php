<?php


namespace JoaoBrandao\LaravelIntervals;

use Carbon\Carbon;
use JoaoBrandao\LaravelIntervals\Contracts\LaravelIntervalsInterface;

class Repository implements LaravelIntervalsInterface
{
    /**
     * Get date time configurations by their names.
     *
     * @param string $name
     * @param array $arguments
     * @return array|\Illuminate\Config\Repository|mixed|string
     * @throws \Exception
     */
    public function __call($name, $arguments)
    {
        $dateTimeConfig = config("laravel-intervals.intervals.$name");

        if (!$dateTimeConfig) {
            throw new \Exception("$name does not exist in the configuration file.");
        }

        if (in_array('toDateTimeString', $arguments)) {
            $dateTimeConfig = self::toDateTimeString($dateTimeConfig);
        }

        return $dateTimeConfig;
    }

    /**
     * Get all date time configurations.
     *
     * @param array $arguments
     * @return \Illuminate\Config\Repository|mixed
     */
    public function all(...$arguments)
    {
        $dateTimeConfig = config('laravel-intervals.intervals');

        if (in_array('toDateTimeString', $arguments)) {
            foreach ($dateTimeConfig as $key => $value) {
                $dateTimeConfig[$key] = self::toDateTimeString($value);
            }
        }

        return $dateTimeConfig;
    }

    /**
     * Get all date time configurations that are enabled.
     *
     * @param mixed ...$arguments
     * @return array
     */
    public function enabled(...$arguments)
    {
        $dateTimeConfig = collect(config('laravel-intervals.intervals'))->filter(function ($value, $key) {
            return $value['enabled'] == true;
        })->all();

        if (in_array('toDateTimeString', $arguments)) {
            foreach ($dateTimeConfig as $key => $value) {
                $dateTimeConfig[$key] = self::toDateTimeString($value);
            }
        }

        return $dateTimeConfig;
    }


    /**
     * Convert Carbon instance to date time string.
     *
     * @param $dateTimeConfig
     * @return array|string
     */
    private static function toDateTimeString($dateTimeConfig)
    {
        if (is_array($dateTimeConfig)) {
            foreach ($dateTimeConfig as $key => $value) {
                $dateTimeConfig[$key] = $value instanceof Carbon
                    ? $value->toDateTimeString()
                    : $value;

            }

            return $dateTimeConfig;
        }

        if ($dateTimeConfig instanceof Carbon) {
            $dateTimeConfig = $dateTimeConfig->toDateTimeString();
        }

        return $dateTimeConfig;
    }

}