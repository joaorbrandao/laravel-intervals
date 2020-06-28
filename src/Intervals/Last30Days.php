<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class Last30Days implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subDays(30),
            'end' => now(),
            'enabled' => true,
            'id' => 'last30Days',
            'name' => 'last_30_days',
        ];
    }
}