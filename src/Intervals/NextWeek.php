<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class NextWeek implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->addWeek()->startOfWeek(),
            'end' => now()->addWeek()->endOfWeek(),
            'enabled' => true,
            'id' => 'nextWeek',
            'name' => 'next_week',
        ];
    }
}
