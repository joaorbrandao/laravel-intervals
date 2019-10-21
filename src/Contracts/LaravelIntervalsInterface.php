<?php


namespace Joaorbrandao\LaravelIntervals\Contracts;

interface LaravelIntervalsInterface
{
    public function __call($name, $arguments);

    public function all();

    public function enabled();
}