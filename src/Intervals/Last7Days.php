<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class Last7Days implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subDays(7),
            'end' => now(),
            'enabled' => true,
            'id' => 'last7Days',
            'name' => 'last_7_days',
        ];
    }
}
