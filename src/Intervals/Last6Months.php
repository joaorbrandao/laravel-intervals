<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class Last6Months implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subMonths(6),
            'end' => now(),
            'enabled' => true,
            'id' => 'last6Months',
            'name' => 'last_6_months',
        ];
    }
}