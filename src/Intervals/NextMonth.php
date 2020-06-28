<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class NextMonth implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->addMonth()->startOfMonth(),
            'end' => now()->addMonth()->endOfMonth(),
            'enabled' => true,
            'id' => 'nextMonth',
            'name' => 'next_month',
        ];
    }
}