<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class DayBeforeYesterday implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subDays(2)->startOfDay(),
            'end' => now()->subDays(2)->endOfDay(),
            'enabled' => true,
            'id' => 'dayBeforeYesterday',
            'name' => 'day_before_yesterday',
        ];
    }
}