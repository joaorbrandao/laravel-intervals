<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class LastYear implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subYear()->startOfYear(),
            'end' => now()->subYear()->endOfYear(),
            'enabled' => true,
            'id' => 'lastYear',
            'name' => 'last_year',
        ];
    }
}