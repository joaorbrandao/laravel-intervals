<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class LastMonth implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subMonth()->startOfMonth(),
            'end' => now()->subMonth()->endOfMonth(),
            'enabled' => true,
            'id' => 'lastMonth',
            'name' => 'last_month',
        ];
    }
}