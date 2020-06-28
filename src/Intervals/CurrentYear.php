<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class CurrentYear implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->startOfYear(),
            'end' => now()->endOfYear(),
            'enabled' => true,
            'id' => 'currentYear',
            'name' => 'current_year',
        ];
    }
}
