<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

class NextYear implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->addYear()->startOfYear(),
            'end' => now()->addYear()->endOfYear(),
            'enabled' => true,
            'id' => 'nextYear',
            'name' => 'next_year',
        ];
    }
}