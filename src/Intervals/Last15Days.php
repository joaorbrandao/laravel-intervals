<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class Last15Days implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subDays(15),
            'end' => now(),
            'enabled' => true,
            'id' => 'last15Days',
            'name' => 'last_15_days',
        ];
    }
}