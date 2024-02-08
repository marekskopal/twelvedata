<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum PrepostEnum: string
{
    case OneMinute = '1min';
    case FiveMinutes = '5min';
    case FifteenMinutes = '15min';
    case ThirtyMinutes = '30min';
}
