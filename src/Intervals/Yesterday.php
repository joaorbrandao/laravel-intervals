<?php


namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class Yesterday implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subDay()->startOfDay(),
            'end' => now()->subDay()->endOfDay(),
            'enabled' => true,
            'id' => 'yesterday',
            'name' => 'yesterday',
        ];
    }
}