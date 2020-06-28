<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class Tomorrow implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->addDay()->startOfDay(),
            'end' => now()->addDay()->endOfDay(),
            'enabled' => true,
            'id' => 'tomorrow',
            'name' => 'tomorrow',
        ];
    }
}
