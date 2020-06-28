<?php

return [

    'intervals' => [
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