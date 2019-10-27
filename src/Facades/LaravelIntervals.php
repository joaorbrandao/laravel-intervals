<?php


namespace Joaorbrandao\LaravelIntervals\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * General
 * @method static array all()
 * @method static array enabled()
 * @method static \Joaorbrandao\LaravelIntervals\Interval parse($start, $end, $id = 'custom')
 *
 * Days
 * @method static \Joaorbrandao\LaravelIntervals\Interval last365Days()
 * @method static \Joaorbrandao\LaravelIntervals\Interval last30Days()
 * @method static \Joaorbrandao\LaravelIntervals\Interval last15Days()
 * @method static \Joaorbrandao\LaravelIntervals\Interval last7Days()
 * @method static \Joaorbrandao\LaravelIntervals\Interval dayBeforeYesterday()
 * @method static \Joaorbrandao\LaravelIntervals\Interval yesterday()
 * @method static \Joaorbrandao\LaravelIntervals\Interval today()
 * @method static \Joaorbrandao\LaravelIntervals\Interval tomorrow()
 * @method static \Joaorbrandao\LaravelIntervals\Interval dayAfterTomorrow()
 *
 * Weeks
 * @method static \Joaorbrandao\LaravelIntervals\Interval lastWeek()
 * @method static \Joaorbrandao\LaravelIntervals\Interval currentWeek()
 * @method static \Joaorbrandao\LaravelIntervals\Interval nextWeek()
 *
 * Months
 * @method static \Joaorbrandao\LaravelIntervals\Interval last12Months()
 * @method static \Joaorbrandao\LaravelIntervals\Interval last6Months()
 * @method static \Joaorbrandao\LaravelIntervals\Interval last4Months()
 * @method static \Joaorbrandao\LaravelIntervals\Interval last3Months()
 * @method static \Joaorbrandao\LaravelIntervals\Interval lastMonth()
 * @method static \Joaorbrandao\LaravelIntervals\Interval currentMonth()
 * @method static \Joaorbrandao\LaravelIntervals\Interval nextMonth()
 *
 * Years
 * @method static \Joaorbrandao\LaravelIntervals\Interval lastYear()
 * @method static \Joaorbrandao\LaravelIntervals\Interval currentYear()
 * @method static \Joaorbrandao\LaravelIntervals\Interval firstQuarterOfCurrentYear()
 * @method static \Joaorbrandao\LaravelIntervals\Interval nextYear()
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