<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class Last12Months implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subMonths(12),
            'end' => now(),
            'enabled' => true,
            'id' => 'last12Months',
            'name' => 'last_12_months',
        ];
    }
}