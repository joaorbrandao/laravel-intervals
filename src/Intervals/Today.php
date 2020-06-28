<?php


namespace App\LaravelIntervals;

use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class Today implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->startOfDay(),
            'end' => now()->endOfDay(),
            'enabled' => true,
            'id' => 'today',
            'name' => 'today',
        ];
    }
}
