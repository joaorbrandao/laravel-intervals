<?php


namespace JoaoBrandao\LaravelIntervals\Contracts;

interface LaravelIntervalsInterface
{
    public function __call($name, $arguments);

    public function all(...$arguments);

    public function enabled(...$arguments);
}