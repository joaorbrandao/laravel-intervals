<?php


namespace Joaorbrandao\LaravelIntervals\Exceptions;

use Throwable;
use \Exception;
use Illuminate\Support\Str;

class IntervalNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "Interval '$message' does not exist: php artisan make:interval " . Str::title($message);

        parent::__construct($message, $code, $previous);
    }
}
