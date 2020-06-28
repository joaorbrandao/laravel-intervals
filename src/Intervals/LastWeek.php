<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class LastWeek implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subWeek()->startOfWeek(),
            'end' => now()->subWeek()->endOfWeek(),
            'enabled' => true,
            'id' => 'lastWeek',
            'name' => 'last_week',
        ];
    }
}
