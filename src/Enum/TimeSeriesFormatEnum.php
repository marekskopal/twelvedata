<?php

declare(strict_types=1);

namespace MarekSkopal\TwelveData\Enum;

enum TimeSeriesFormatEnum: string
{
    case JSON = 'JSON';
    case CSV = 'CSV';
}
