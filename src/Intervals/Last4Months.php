<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class Last4Months implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subMonths(4),
            'end' => now(),
            'enabled' => true,
            'id' => 'last4Months',
            'name' => 'last_4_months',
        ];
    }
}