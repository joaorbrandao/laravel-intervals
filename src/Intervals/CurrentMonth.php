<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class CurrentMonth implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->startOfMonth(),
            'end' => now()->endOfMonth(),
            'enabled' => true,
            'id' => 'currentMonth',
            'name' => 'current_month',
        ];
    }
}
