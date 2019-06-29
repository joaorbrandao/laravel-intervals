<?php


namespace JoaoBrandao\LaravelIntervals\Contracts;

interface LaravelIntervalsInterface
{
    public function all(...$arguments);

    public function enabled(...$arguments);
}