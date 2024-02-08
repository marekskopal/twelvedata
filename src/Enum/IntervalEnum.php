<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum IntervalEnum: string
{
    case OneMinute = '1min';
    case FiveMinutes = '5min';
    case FifteenMinutes = '15min';
    case ThirtyMinutes = '30min';
    case FortyFiveMinutes = '45min';
    case OneHour = '1h';
    case TwoHour = '2h';
    case FourHour = '4h';
    case OneDay = '1day';
    case OneWeek = '1week';
    case OneMonth = '1month';
}
