<?php


namespace Joaorbrandao\LaravelIntervals\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * General
 * @method static self all()
 * @method static self enabled()
 *
 * Days
 * @method static self last365Days()
 * @method static self last30Days()
 * @method static self last15Days()
 * @method static self last7Days()
 * @method static self dayBeforeYesterday()
 * @method static self yesterday()
 * @method static self today()
 * @method static self tomorrow()
 * @method static self dayAfterTomorrow()
 *
 * Weeks
 * @method static self lastWeek()
 * @method static self currentWeek()
 * @method static self nextWeek()
 *
 * Months
 * @method static self last12Months()
 * @method static self last6Months()
 * @method static self last4Months()
 * @method static self last3Months()
 * @method static self lastMonth()
 * @method static self currentMonth()
 * @method static self nextMonth()
 *
 * Years
 * @method static self lastYear()
 * @method static self currentYear()
 * @method static self firstQuarterOfCurrentYear()
 * @method static self nextYear()
 *
 * @see \Joaorbrandao\LaravelIntervals\Repository
 */
class LaravelIntervals extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-intervals';
    }
}