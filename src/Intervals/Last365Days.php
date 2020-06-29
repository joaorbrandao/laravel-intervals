<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class Last365Days implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subDays(365),
            'end' => now(),
            'enabled' => true,
            'id' => 'last365Days',
            'name' => 'last_365_days',
        ];
    }
}
