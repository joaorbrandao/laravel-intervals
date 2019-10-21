<?php


namespace Joaorbrandao\LaravelIntervals\Exceptions;

use \Exception;
use Throwable;

class ConfigurationNotFoundException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = "Configuration '$message' does not exist on 'config/laravel-intervals.php'.";

        parent::__construct($message, $code, $previous);
    }
}