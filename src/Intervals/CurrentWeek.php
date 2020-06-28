<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class CurrentWeek implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->startOfWeek(),
            'end' => now()->endOfWeek(),
            'enabled' => true,
            'id' => 'currentWeek',
            'name' => 'current_week',
        ];
    }
}