<?php


namespace Joaorbrandao\LaravelIntervals\Contracts;

use Joaorbrandao\LaravelIntervals\Interval;

interface LaravelIntervalsInterface
{
    public function __call($name, $arguments): Interval;

    public function all(): array;

    public function enabled(): array;
}
