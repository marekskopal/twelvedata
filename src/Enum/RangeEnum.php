<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum RangeEnum: string
{
    case Last = 'last';
    case OneMonth = '1m';
    case ThreeMonths = '3m';
    case SixMonths = '6m';
    case YTD = 'ytd';
    case OneYear = '1y';
    case TwoYears = '2y';
    case FiveYears = '5y';
    case Full = 'full';
}
