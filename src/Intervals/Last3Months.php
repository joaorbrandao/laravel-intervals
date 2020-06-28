<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class Last3Months implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subMonths(3),
            'end' => now(),
            'enabled' => true,
            'id' => 'last3Months',
            'name' => 'last_3_months',
        ];
    }
}