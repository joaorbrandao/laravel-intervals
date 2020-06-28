<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class DayAfterTomorrow implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->addDays(2)->startOfDay(),
            'end' => now()->addDays(2)->endOfDay(),
            'enabled' => true,
            'id' => 'dayAfterTomorrow',
            'name' => 'day_after_tomorrow',
        ];
    }
}