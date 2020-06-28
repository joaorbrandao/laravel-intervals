# laravel-intervals
This package creates a simple way of adding time intervals to your projects.

[![Latest Stable Version](https://poser.pugx.org/joaorbrandao/laravel-intervals/v/stable)](https://packagist.org/packages/joaorbrandao/laravel-intervals)
[![Total Downloads](https://poser.pugx.org/joaorbrandao/laravel-intervals/downloads)](https://packagist.org/packages/joaorbrandao/laravel-intervals)
[![License](https://poser.pugx.org/joaorbrandao/laravel-intervals/license)](https://packagist.org/packages/joaorbrandao/laravel-intervals)

## Installing 
```shell
composer require joaorbrandao/laravel-intervals
```
Publish the package into your application.
```php
php artisan vendor:publish --provider=Joaorbrandao\LaravelIntervals\LaravelIntervalsServiceProvider
```
A folder containing some filters will be published in "app/LaravelIntervals". <br>
Feel free to modify/delete them if you want!

## Usage
### Create a new Interval
This command will create a new interval in "app/LaravelIntervals".
```php
php artisan make:interval FirstDayOfLastWeek
```
### Setup the Interval
Each time interval has 5 properties: start, end, enabled, id and name.<br>

| Property | Description                                   |
|----------|-----------------------------------------------|
| start    | Represents the start time of the interval.    |
| end      | Represents the end time of the interval.      |
| enabled  | Enables/disables the usage of the interval.   |
| id       | Identifies the interval as unique.            |
| name     | The interval's name for translation purposes. |

#### 2. Add custom intervals made by yourself
Adding a custom time interval is as easy as adding a new entry set to "intervals" in the configuration file.
```php
<?php

namespace App\LaravelIntervals;


use Joaorbrandao\LaravelIntervals\Contracts\Interval;

final class FirstDayOfLastWeek implements Interval
{
    public function resolve()
    {
        return [
            'start' => now()->subWeek()->startOfWeek()->startOfday(),
                        'end' => now()->subWeek()->startOfWeek()->endOfDay(),
                        'enabled' => true,
                        'id' => 'firstDayOfLastWeek',
                        'name' => 'first_day_of_last_week',
        ];
    }
}
```

### Facade
One of the ways of using this is with the Facade.
The result of the facade is the time interval set defined in the configuration file with the start and end properties being Carbon instances.
```php
LaravelIntervals::last365Days();

// Return
Joaorbrandao\LaravelIntervals\Interval^ {#382
    +end: Illuminate\Support\Carbon @1571693543^ {#767
        date: 2019-10-21 21:32:23.050513 UTC (+00:00)
    }
    +id: "last365Days"
    +name: "last_65_days"
    +start: Illuminate\Support\Carbon @1540157543^ {#768
        date: 2018-10-21 21:32:23.050440 UTC (+00:00)
    } 
}
```

## License
laravel-intervals is an open-source laravel package licensed under the MIT license.