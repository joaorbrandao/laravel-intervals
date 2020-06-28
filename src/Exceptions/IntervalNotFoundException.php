<?php


namespace Joaorbrandao\LaravelIntervals\Exceptions;

use \Exception;
use Illuminate\Support\Str;
use Throwable;

class IntervalNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "Interval '$message' does not exist: php artisan make:interval " . Str::title($message);

        parent::__construct($message, $code, $previous);
    }
}