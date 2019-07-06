<?php

return [

    'enabled' => true,

    'intervals' => [
        #region Days
        'last365Days' => [
            'start' => now()->subDays(365),
            'end' => now(),
            'enabled' => true,
            'id' => 'last365Days',
            'name' => 'last_365_days',
        ],

        'last30Days' => [
            'start' => now()->subDays(30),
            'end' => now(),
            'enabled' => true,
            'id' => 'last30Days',
            'name' => 'last_30_days',
        ],

        'last15Days' => [
            'start' => now()->subDays(15),
            'end' => now(),
            'enabled' => true,
            'id' => 'last15Days',
            'name' => 'last_15_days',
        ],

        'last7Days' => [
            'start' => now()->subDays(7),
            'end' => now(),
            'enabled' => true,
            'id' => 'last7Days',
            'name' => 'last_7_days',
        ],

        'dayBeforeYesterday' => [
            'start' => now()->subDays(2)->startOfDay(),
            'end' => now()->subDays(2)->endOfDay(),
            'enabled' => true,
            'id' => 'dayBeforeYesterday',
            'name' => 'day_before_yesterday',
        ],

        'yesterday' => [
            'start' => now()->subDay()->startOfDay(),
            'end' => now()->subDay()->endOfDay(),
            'enabled' => true,
            'id' => 'yesterday',
            'name' => 'yesterday',
        ],

        'today' => [
            'start' => now()->startOfDay(),
            'end' => now()->endOfDay(),
            'enabled' => true,
            'id' => 'today',
            'name' => 'today',
        ],

        'tomorrow' => [
            'start' => now()->addDay()->startOfDay(),
            'end' => now()->addDay()->endOfDay(),
            'enabled' => true,
            'id' => 'tomorrow',
            'name' => 'tomorrow',
        ],

        'dayAfterTomorrow' => [
            'start' => now()->addDays(2)->startOfDay(),
            'end' => now()->addDays(2)->endOfDay(),
            'enabled' => true,
            'id' => 'dayAfterTomorrow',
            'name' => 'day_after_tomorrow',
        ],
        #endregion


        #region Weeks
        'lastWeek' => [
            'start' => now()->subWeek()->startOfWeek(),
            'end' => now()->subWeek()->endOfWeek(),
            'enabled' => true,
            'id' => 'lastWeek',
            'name' => 'last_week',
        ],

        'currentWeek' => [
            'start' => now()->startOfWeek(),
            'end' => now()->endOfWeek(),
            'enabled' => true,
            'id' => 'currentWeek',
            'name' => 'current_week',
        ],

        'nextWeek' => [
            'start' => now()->addWeek()->startOfWeek(),
            'end' => now()->addWeek()->endOfWeek(),
            'enabled' => true,
            'id' => 'nextWeek',
            'name' => 'next_week',
        ],
        #endregion


        #region Months
        'last12Months' => [
            'start' => now()->subMonths(12),
            'end' => now(),
            'enabled' => true,
            'id' => 'last12Months',
            'name' => 'last_12_months',
        ],

        'last6Months' => [
            'start' => now()->subMonths(6),
            'end' => now(),
            'enabled' => true,
            'id' => 'last6Months',
            'name' => 'last_6_months',
        ],

        'last4Months' => [
            'start' => now()->subMonths(4),
            'end' => now(),
            'enabled' => true,
            'id' => 'last4Months',
            'name' => 'last_4_months',
        ],

        'last3Months' => [
            'start' => now()->subMonths(3),
            'end' => now(),
            'enabled' => true,
            'id' => 'last3Months',
            'name' => 'last_3_months',
        ],

        'lastMonth' => [
            'start' => now()->subMonth()->startOfMonth(),
            'end' => now()->subMonth()->endOfMonth(),
            'enabled' => true,
            'id' => 'lastMonth',
            'name' => 'last_month',
        ],

        'currentMonth' => [
            'start' => now()->startOfMonth(),
            'end' => now()->endOfMonth(),
            'enabled' => true,
            'id' => 'currentMonth',
            'name' => 'current_month',
        ],

        'nextMonth' => [
            'start' => now()->addMonth()->startOfMonth(),
            'end' => now()->addMonth()->endOfMonth(),
            'enabled' => true,
            'id' => 'nextMonth',
            'name' => 'next_month',
        ],
        #endregion


        #region Years
        'lastYear' => [
            'start' => now()->subYear()->startOfYear(),
            'end' => now()->subYear()->endOfYear(),
            'enabled' => true,
            'id' => 'lastYear',
            'name' => 'last_year',
        ],

        'currentYear' => [
            'start' => now()->startOfYear(),
            'end' => now()->endOfYear(),
            'enabled' => true,
            'id' => 'currentYear',
            'name' => 'current_year',
        ],

        'firstQuarterOfCurrentYear' => [
            'start' => now()->startOfYear(),
            'end' => now()->startOfYear()->addMonths(3)->endOfMonth(),
            'enabled' => true,
            'id' => 'firstQuarterOfCurrentYear',
            'name' => 'first_quarter_of_current_year',
        ],

        'nextYear' => [
            'start' => now()->addYear()->startOfYear(),
            'end' => now()->addYear()->endOfYear(),
            'enabled' => true,
            'id' => 'nextYear',
            'name' => 'next_year',
        ],
        #endregion
    ],

];