<?php


namespace Joaorbrandao\LaravelIntervals;


use Illuminate\Support\Str;

class IntervalFactory
{
    public static function resolve(string $name)
    {
        $data = null;

        $intervalFiles = self::intervals();
        foreach ($intervalFiles as $file)
        {
            if (Str::contains(Str::upper($file), Str::upper($name))) {
                require_once $file;

                // get the file name of the current file without the extension
                // which is essentially the class name
                $class = basename($file, '.php');

                $class = 'App\\LaravelIntervals\\' . $class;

                if (class_exists($class))
                {
                    $interval = new $class;
                    $data = $interval->resolve();
                    break;
                }
            }
        }

        return $data;
    }

    public static function all()
    {
        $data = [];

        $intervalFiles = self::intervals();

        foreach ($intervalFiles as $file)
        {
            require_once $file;

            // get the file name of the current file without the extension
            // which is essentially the class name
            $class = basename($file, '.php');

            $classWithNamespace = 'App\\LaravelIntervals\\' . $class;

            if (class_exists($classWithNamespace))
            {
                $interval = new $classWithNamespace;
                $data[Str::camel($class)] = $interval->resolve();
                break;
            }
        }

        return $data;
    }



    private static function intervals()
    {
        if (!empty($intervals = glob(app_path() . '/LaravelIntervals/*.php'))) {
            return glob(app_path() . '/LaravelIntervals/*.php');
        }

        return glob(__DIR__ . '/Intervals/*.php');
    }
}