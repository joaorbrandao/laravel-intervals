<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class FirstQuarterOfCurrentYear implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->startOfYear(),
            'end' => now()->startOfYear()->addMonths(3)->endOfMonth(),
            'enabled' => true,
            'id' => 'firstQuarterOfCurrentYear',
            'name' => 'first_quarter_of_current_year',
        ];
    }
}
